<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:59:31
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

use function array_merge;
use function is_callable;

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
    public function init() : void
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
    public function getHttpClient() : Client
    {
        if ($this->_httpClient === null) {
            $this->_httpClient = Yii::createObject(array_merge([
                'class' => Client::class,
                'baseUrl' => $this->apiUrl . '/bot' . $this->botToken,
                'as compression' => HttpCompressionBehavior::class
            ], $this->httpClientConfig ?: []));
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
    public function createRequest(array $config) : TelegramRequest
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return Yii::createObject($config, [$this]);
    }

    /**
     * Устанавливает webhook.
     *
     * @throws Exception
     */
    public function installWebHook() : void
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
