<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:54:16
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\validate\ValidateException;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\Model;

use function is_array;
use function preg_replace;
use function str_replace;

/**
 * Абстрактный запрос.
 *
 * @property-read TelegramModule $module
 */
abstract class TelegramRequest extends Model
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
     * Модуль.
     */
    public function getModule(): TelegramModule
    {
        return $this->_module;
    }

    /**
     * Возвращает функцию API
     *
     * @return string
     */
    public function func(): string
    {
        $func = str_replace(__NAMESPACE__ . '\\', '', static::class);

        return preg_replace('~Request$~u', '', $func);
    }

    /**
     * Возвращает данные для отправки.
     *
     * @return array
     */
    public function data(): array
    {
        return $this->attributes;
    }

    /**
     * Конвертирует результат запроса.
     *
     * @param array $result данные результата запроса
     * @return ?TelegramEntity
     * Конкретный тип результата переопределяется в phpdoc наследника.
     */
    protected function convertResult(array $result)
    {
        return null;
    }

    /**
     * Отправляет запрос.
     *
     * @return mixed ответ
     * @throws ValidateException
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception|Exception
     */
    public function send()
    {
        if (! $this->validate()) {
            throw new ValidateException($this);
        }

        $result = $this->module->send($this->func(), $this->data());

        return is_array($result) ? $this->convertResult($result) : $result;
    }
}
