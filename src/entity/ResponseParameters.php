<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:03:38
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains information about why a request was unsuccessful.
 * Содержит информацию для повтора сообщения в случае ошибки.
 *
 * @link https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters extends TelegramEntity
{
    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision
     * float type are safe for storing this identifier.
     */
    public ?int $migrateToChatId = null;

    /**
     * Optional. In case of exceeding flood control, the number of seconds left to wait before the
     * request can be repeated.
     */
    public ?int $retryAfter = null;
}
