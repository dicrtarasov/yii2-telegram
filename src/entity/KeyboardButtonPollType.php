<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:38:17
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding
 * button is pressed.
 *
 * @link https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType extends TelegramEntity
{
    /**
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     * If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to
     * create a poll of any type.
     */
    public ?string $type = null;
}
