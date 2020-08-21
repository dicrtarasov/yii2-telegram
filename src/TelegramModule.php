<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 22.08.20 00:23:42
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\helper\Url;
use dicr\http\HttpCompressionBehavior;
use dicr\telegram\request\MessageRequest;
use dicr\telegram\request\SetWebhookRequest;
use dicr\validate\ValidateException;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\Module;
use yii\httpclient\Client;
use yii\web\Application;

use function array_filter;
use function array_merge;
use function is_callable;
use function json_encode;

/**
 * Модуль для Telegram.
 *
 * @property-read Client $httpClient
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

    /** @inheritDoc */
    public $controllerNamespace = __NAMESPACE__;

    /**
     * @var callable function(Update $update, TelegramModule $module)
     */
    public $callback;

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

        if (! empty($this->callback) && ! is_callable($this->callback)) {
            throw new InvalidConfigException('callback');
        }

        // принимаем JSON-запросы
        if (Yii::$app instanceof Application) {
            Yii::$app->request->parsers['application/json'] = yii\web\JsonParser::class;
        }
    }

    /** @var Client */
    private $_client;

    /**
     * Клиент HTTP.
     *
     * @return Client
     * @throws InvalidConfigException
     */
    public function getHttpClient(): Client
    {
        if (! isset($this->_client)) {
            $this->_client = Yii::createObject(array_merge([
                'class' => Client::class,
                'baseUrl' => $this->apiUrl . '/bot' . $this->botToken,
                'as compression' => HttpCompressionBehavior::class,
                'requestConfig' => [
                    'method' => 'post',
                    'format' => Client::FORMAT_JSON
                ],
            ], $this->httpClientConfig ?: []));
        }

        return $this->_client;
    }

    /**
     * Отправляет данные.
     *
     * @param string $url URL функции
     * @param array $data данные для отправки
     * @return mixed ответ
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception
     * @throws Exception
     */
    public function send(string $url, array $data)
    {
        $request = $this->httpClient->createRequest();
        $request->url = $url;

        $request->data = array_filter($data, static function ($val) {
            return $val !== null && $val !== '' && $val !== [];
        });

        $response = $request->send();
        if (! $response->isOk || empty($response->data['ok'])) {
            $message = ! empty($response->data['description']) ? $response->data['description'] : $response->content;
            throw new Exception('Ошибка отправки запроса: ' . $message);
        }

        return $response->data['result'] ?? null;
    }

    /**
     * Устанавливает webhook.
     *
     * @param ?SetWebhookRequest $request
     * @return mixed
     * @throws Exception
     * @throws InvalidConfigException
     * @throws ValidateException
     * @throws \yii\httpclient\Exception
     */
    public function installWebHook(?SetWebhookRequest $request = null)
    {
        if (empty($request)) {
            $request = new SetWebhookRequest($this, [
                'url' => Url::to($this->uniqueId . '/webhook', true)
            ]);
        }

        $response = $request->send();
        if ($response === true) {
            Yii::debug('Установлен webhook: ' . $request->url, __METHOD__);
        } else {
            Yii::warning('Ошибка установки webhook: ' . json_encode($response), __METHOD__);
        }

        return $response;
    }

    /**
     * Запрос отправки сообщения.
     *
     * @param array $config
     * @return MessageRequest
     */
    public function createMessageRequest(array $config = []): MessageRequest
    {
        return new MessageRequest($this, $config);
    }
}
