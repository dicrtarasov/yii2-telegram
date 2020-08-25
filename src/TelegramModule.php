<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 02:02:52
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\helper\Url;
use dicr\http\HttpCompressionBehavior;
use dicr\telegram\request\SetWebhook;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\Module;
use yii\httpclient\Client;
use yii\web\Application;
use yii\web\JsonParser;

use function array_filter;
use function is_callable;
use function sleep;

/**
 * Модуль для Telegram.
 *
 * @property-read Client $httpClient
 * @link https://core.telegram.org/bots/api
 */
class TelegramModule extends Module
{
    /** @var string URL Telegram API по-умолчанию */
    public const API_BASE = 'https://api.telegram.org';

    /** @var string URL Telegram API */
    public $apiUrl = self::API_BASE;

    /** @var string токен бота, который выдается при создании бота */
    public $botToken;

    /** @var array конфиг httpClient */
    public $httpClientConfig = [];

    /**
     * @var callable function(Update $update, TelegramModule $module) обработчик обновлений от Telegram
     */
    public $handler;

    /** @inheritDoc */
    public $controllerNamespace = __NAMESPACE__;

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (empty($this->apiUrl)) {
            throw new InvalidConfigException('apiUrl');
        }

        if (empty($this->botToken)) {
            throw new InvalidConfigException('botToken');
        }

        if (! empty($this->handler) && ! is_callable($this->handler)) {
            throw new InvalidConfigException('handler');
        }

        // принимаем JSON-запросы
        if (Yii::$app instanceof Application) {
            Yii::$app->request->parsers['application/json'] = JsonParser::class;
        }
    }

    /** @var Client */
    private $_httpClient;

    /**
     * Клиент HTTP.
     *
     * @return Client
     * @throws InvalidConfigException
     */
    public function getHttpClient(): Client
    {
        if (! isset($this->_httpClient)) {
            $config = $this->httpClientConfig ?: [];

            if (! isset($config['class'])) {
                $config['class'] = Client::class;
            }

            if (! isset($config['baseUrl'])) {
                $config['baseUrl'] = $this->apiUrl . '/bot' . $this->botToken;
            }

            if (! isset($config['as compression'])) {
                $config['as compression'] = HttpCompressionBehavior::class;
            }

            $this->_httpClient = Yii::createObject($config);
        }

        return $this->_httpClient;
    }

    /**
     * Создает запрос.
     *
     * @param array $config
     * @return TelegramRequest
     * @throws InvalidConfigException
     */
    public function createRequest(array $config): TelegramRequest
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return Yii::createObject($config, [$this]);
    }

    /**
     * Отправляет данные.
     *
     * @param string $url URL функции
     * @param array $data данные для отправки
     * @return mixed ответ
     * @throws Exception
     */
    public function send(string $url, array $data)
    {
        // фильтруем данные
        $data = array_filter($data, static function ($val) {
            return $val !== null && $val !== '' && $val !== [];
        });

        // создаем запрос
        $request = $this->getHttpClient()->post($url, $data, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Accept' => 'application/json',
            'Accept-Charset' => 'UTF-8'
        ]);

        // получаем ответ
        $response = $request->send();
        if (! $response->isOk) {
            throw new Exception('Ошибка отправки запроса: ' . $response->statusCode);
        }

        // проверяем ответ
        $response->format = Client::FORMAT_JSON;

        // формируем ответ Telegram
        $tgResponse = new TelegramResponse([
            'json' => $response->data
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
                return $this->send($url, $data);
            }

            throw new Exception('Ошибка отправки запроса: ' . $tgResponse->description);
        }

        // возвращаем результат
        return $tgResponse->result;
    }

    /**
     * Устанавливает webhook.
     *
     * @throws Exception
     */
    public function installWebHook(): void
    {
        /** @var SetWebhook $request */
        $request = $this->createRequest([
            'class' => SetWebhook::class,
            'url' => Url::to('/' . $this->uniqueId . '/webhook', true)
        ]);

        // при ошибке будет Exception
        $request->send();

        Yii::debug('Установлен webhook: ' . $request->url, __METHOD__);
    }
}
