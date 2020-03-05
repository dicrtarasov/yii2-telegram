<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.03.20 02:29:05
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use ReflectionObject;
use ReflectionProperty;
use Yii;
use yii\base\BaseObject;

/**
 * Базовый элемент данных.
 *
 * @package app\modules\sitemon\components
 */
abstract class BaseEntity extends BaseObject
{
    /**
     * Конструктор.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if ($config) {
            $this->configure($config);
        }

        parent::__construct();
    }

    /**
     * Конфигурация объекта из данных json.
     * Должна быть переопределена для конфигурации полями с другими именами.
     *
     * @param array $data
     * @return $this
     */
    public function configure(array $data)
    {
        Yii::configure($this, $data);

        return $this;
    }

    /**
     * Возвращает JSON данные объекта.
     *
     * Реализация по-умолчанию возвращает публичные свойства объекта.
     * Если свойства json отличаются, то необходимо переопределить.
     *
     * @return array
     */
    public function toData()
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
