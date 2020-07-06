<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:54:16
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\telegram\entity\BaseEntity;
use dicr\validate\ValidateException;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\Model;
use function array_filter;

/**
 * Абстрактный запрос.
 *
 * @property-read TelegramClient $client
 *
 * @package app\modules\sitemon\components
 */
abstract class TelegramRequest extends Model
{
    /** @var TelegramClient */
    private $_client;

    /**
     * Конструктор.
     *
     * @param TelegramClient $client
     * @param array $config
     */
    public function __construct(TelegramClient $client, array $config = [])
    {
        $this->_client = $client;

        parent::__construct($config);
    }

    /**
     * Установить клиент.
     *
     * @param TelegramClient $client
     */
    public function getClient(TelegramClient $client)
    {
        $this->client = $client;
    }

    /**
     * Возвращает функцию API
     *
     * @return string
     */
    abstract protected function func();

    /**
     * Возвращает данные для отправки.
     *
     * @return array
     */
    abstract protected function data();

    /**
     * Конвертирует результат запроса.
     *
     * @param array $result
     * @return BaseEntity
     */
    abstract protected function result(array $result);

    /**
     * Отправляет запрос.
     *
     * @return BaseEntity|bool
     * @throws ValidateException
     * @throws Exception
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function send()
    {
        if (! $this->validate()) {
            throw new ValidateException($this);
        }

        $request = $this->_client->createRequest();

        $request->url = $this->func();

        $request->data = array_filter($this->data(), static function($val) {
            return $val !== null && $val !== '' && $val !== [];
        });

        $response = $request->send();
        if (! $response->isOk || empty($response->data['ok'])) {
            $message = ! empty($response->data['description']) ? $response->data['description'] : $response->content;
            throw new Exception('Ошибка отправки запроса: ' . $message);
        }

        return ! empty($response->data['result']) ? $this->result($response->data['result']) : true;
    }
}
