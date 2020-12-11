<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 11.12.20 21:56:02
 */

declare(strict_types = 1);
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
    /** @var TelegramModule */
    private $_module;

    /**
     * Конструктор.
     *
     * @param TelegramModule $module
     * @param array $config
     */
    public function __construct(TelegramModule $module, array $config = [])
    {
        $this->_module = $module;

        parent::__construct($config);
    }

    /**
     * Возвращает функцию API
     *
     * @return string
     */
    abstract public function func() : string;

    /**
     * Отправляет запрос.
     *
     * @return array ответ (переопределяется в наследуемом классе)
     * @throws Exception
     * @noinspection PhpMissingReturnTypeInspection
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function send()
    {
        // фильтруем данные
        $data = array_filter($this->json, static function ($val) : bool {
            return $val !== null && $val !== '' && $val !== [];
        });

        // создаем запрос
        $req = $this->_module->httpClient->post($this->func(), $data, [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);

        // получаем ответ
        Yii::debug('Запрос: ' . $req->toString(), __METHOD__);
        $res = $req->send();
        Yii::debug('Ответ: ' . $res->toString(), __METHOD__);

        if (! $res->isOk) {
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

            if (! empty($retryAfter)) {
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
