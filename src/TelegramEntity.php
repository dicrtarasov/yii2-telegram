<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 22:05:10
 */

declare(strict_types = 1);

namespace dicr\telegram;

use dicr\helper\JsonEntity;

/**
 * Базовый элемент данных.
 *
 * @link https://core.telegram.org/bots/api
 */
abstract class TelegramEntity extends JsonEntity
{
    // noop
}
