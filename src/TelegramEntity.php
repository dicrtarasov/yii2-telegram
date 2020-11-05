<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:36:26
 */

declare(strict_types = 1);

namespace dicr\telegram;

use dicr\json\JsonEntity;

/**
 * Базовый элемент данных.
 *
 * @link https://core.telegram.org/bots/api
 */
abstract class TelegramEntity extends JsonEntity
{
    // noop
}
