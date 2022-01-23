<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:38:03
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used
 * instead of this object to specify text of the button. Optional fields request_contact, request_location,
 * and request_poll are mutually exclusive.
 *
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends TelegramEntity
{
    /**
     * Text of the button. If none of the optional fields are used, it will be sent as
     * a message when the button is pressed
     */
    public ?string $text = null;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only
     */
    public ?bool $requestContact = null;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only
     */
    public ?bool $requestLocation = null;

    /**
     * Optional. If specified, the user will be asked to create a poll
     * and send it to the bot when the button is pressed. Available in private chats only
     */
    public array|KeyboardButtonPollType|null $requestPoll = null;
}
