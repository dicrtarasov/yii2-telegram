<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 02:59:49
 */

declare(strict_types=1);
namespace dicr\telegram;

use Yii;
use yii\base\Exception;
use yii\httpclient\Client;

use function array_filter;
use function sleep;

/**
 * Абстрактный запрос.
 */
abstract class TelegramRequest extends TelegramEntity
{
    /**
     * Конструктор.
     */
    public function __construct(
        protected TelegramModule $module,
        array $config = []
    ) {
        parent::__construct($config);
    }

    /**
     * Возвращает функцию API
     */
    abstract public function func(): string;

    /**
     * Отправляет запрос.
     *
     * @return array ответ (переопределяется в наследуемом классе)
     * @throws Exception
     */
    public function send(): mixed
    {
        // фильтруем данные
        $data = array_filter(
            $this->json,
            static fn($val): bool => $val !== null && $val !== '' && $val !== []
        );

        // создаем запрос
        $req = $this->module->httpClient()
            ->post($this->func(), $data, [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]);

        // получаем ответ
        Yii::debug('Запрос: ' . $req->toString(), __METHOD__);
        $res = $req->send();
        Yii::debug('Ответ: ' . $res->toString(), __METHOD__);

        if (!$res->isOk) {
            throw new Exception('HTTP-error: ' . $res->statusCode);
        }

        // формируем ответ Telegram
        $res->format = Client::FORMAT_JSON;
        $tgResponse = new TelegramResponse([
            'json' => $res->data
        ]);

        // обработка ошибок
        if (empty($tgResponse->ok)) {
            // если запрос был отфильтрован из-за flood-фильтра, то повторяем запрос
            $retryAfter = (int)$tgResponse->parameters->retryAfter;

            if (!empty($retryAfter)) {
                Yii::warning(
                    'Сработал flood-фильтр, ожидаем ' . $retryAfter . ' секунд ...', __METHOD__
                );

                // спим ...
                sleep($retryAfter);

                // повторяем отправку запроса
                return $this->send();
            }

            throw new Exception('Ошибка отправки запроса: ' . $tgResponse->description);
        }

        // возвращаем результат
        return $tgResponse->result;
    }
}
