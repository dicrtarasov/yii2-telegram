<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 23:21:19
 */

declare(strict_types = 1);

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
     * @var string Text of the button. If none of the optional fields are used, it will be sent as
     * a message when the button is pressed
     */
    public $text;

    /**
     * @var ?bool Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only
     */
    public $requestContact;

    /**
     * @var ?bool Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only
     */
    public $requestLocation;

    /**
     * @var ?KeyboardButtonPollType Optional. If specified, the user will be asked to create a poll
     * and send it to the bot when the button is pressed. Available in private chats only
     */
    public $requestPoll;
}
