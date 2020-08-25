<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 23:03:13
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\helper\JsonEntity;
use dicr\validate\ValidateException;
use yii\base\Exception;

/**
 * Абстрактный запрос.
 *
 * @property-read TelegramModule $module
 */
abstract class TelegramRequest extends JsonEntity
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
    abstract public function func(): string;

    /**
     * @inheritDoc
     * @throws ValidateException
     */
    public function getJson(): array
    {
        // проверяем модель перед возвратом данных
        if (! $this->validate()) {
            throw new ValidateException($this);
        }

        return parent::getJson();
    }

    /**
     * Отправляет запрос.
     *
     * @return array ответ (переопределяется в наследуемом классе)
     * @throws Exception
     */
    public function send()
    {
        return $this->_module->send($this->func(), $this->getJson());
    }
}
