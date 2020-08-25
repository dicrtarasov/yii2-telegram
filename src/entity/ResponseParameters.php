<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 22:41:34
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
     * @var ?int Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision
     * float type are safe for storing this identifier.
     */
    public $migrateToChatId;

    /**
     * @var ?int Optional. In case of exceeding flood control, the number of seconds left to wait before the
     * request can be repeated.
     */
    public $retryAfter;
}
