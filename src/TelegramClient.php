<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:53:18
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\http\HttpCompressionBehavior;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;

/**
 * Telegram Bot API Client.
 *
 * @link https://core.telegram.org/bots/api
 */
class TelegramClient extends Client
{
    /** @var string URL Telegram API по-умолчанию */
    public const API_BASE = 'https://api.telegram.org';

    /** @var string URL Telegram API */
    public $apiBase = self::API_BASE;

    /** @var string токен бота, который выдается при создании бота */
    public $botToken;

    /**
     * @inheritDoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        if (empty($this->apiBase)) {
            throw new InvalidConfigException('apiUrl');
        }

        if (empty($this->botToken)) {
            throw new InvalidConfigException('botToken');
        }

        if (empty($this->chatId)) {
            throw new InvalidConfigException('chatId');
        }

        $this->baseUrl = $this->apiBase . '/bot' . $this->botToken;

        $this->requestConfig = [
            'method' => 'POST',
            'format' => Client::FORMAT_JSON
        ];

        $this->responseConfig = [
            'format' => Client::FORMAT_JSON
        ];
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'compress' => HttpCompressionBehavior::class
        ]);
    }

    /**
     * Запрос отправки сообщения.
     *
     * @param array $config
     * @return MessageRequest
     */
    public function createMessageRequest(array $config = [])
    {
        return new MessageRequest($this, $config);
    }
}
