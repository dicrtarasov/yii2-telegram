<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 21.08.20 21:42:17
 */

declare(strict_types = 1);

namespace dicr\telegram;

use ReflectionObject;
use ReflectionProperty;
use yii\base\BaseObject;

/**
 * Базовый элемент данных.
 *
 * @property array $data данные для конфигурации
 */
abstract class TelegramEntity extends BaseObject
{
    /**
     * Конструктор.
     * Переопределяет конструктор, чтобы изменить стандартный способ конфигурации объекта
     * через Yii::configure, на пере-определенный configure, который заменяет названия полей в данных,
     * полученных из JSON.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        // вместо стандартного вызываем свой метод конфигурации
        if ($config) {
            $this->data = $config;
        }

        // родителю не передаем данные конфигурации
        parent::__construct();
    }

    /**
     * Конфигурация объекта из данных json.
     * Должна быть переопределена для конфигурации полями с другими именами.
     * По-умолчанию вызывает стандартный Yii::configure
     *
     * @param array $data данные конфигурации
     */
    public function setData(array $data)
    {
        // по-умолчанию вызываем стандартный метод без переопределения данных
        //Yii::configure($this, $data);
    }

    /**
     * Возвращает JSON данные объекта.
     *
     * Реализация по-умолчанию возвращает публичные свойства объекта.
     * Если свойства json отличаются, то необходимо переопределить.
     *
     * @return array
     */
    public function getData(): array
    {
        $reflection = new ReflectionObject($this);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $data = [];
        foreach ($props as $prop) {
            $name = $prop->name;
            $val = $this->{$name};

            if ($val !== null && $val !== '') {
                $data[$name] = $val;
            }
        }

        return $data;
    }
}
