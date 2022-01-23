<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:34:53
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents one button of an inline keyboard.
 * You must use exactly one of the optional fields.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends TelegramEntity
{
    /** Label text on the button */
    public ?string $text = null;

    /** Optional. HTTP or tg:// url to be opened when button is pressed */
    public ?string $url = null;

    /**
     * Optional. An HTTP URL used to automatically authorize the user. Can be used as a
     * replacement for the Telegram Login Widget.
     */
    public array|LoginUrl|null $loginUrl = null;

    /** Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes */
    public ?string $callbackData = null;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats,
     * open that chat and insert the bot's username and the specified inline query in the input field.
     * Can be empty, in which case just the bot's username will be inserted.
     *
     * Note: This offers an easy way for users to start using your bot in inline mode when they are currently
     * in a private chat with it. Especially useful when combined with switch_pm… actions – in this case the
     * user will be automatically returned to the chat they switched from, skipping the chat selection screen.
     */
    public ?string $switchInlineQuery = null;

    /**
     * Optional. If set, pressing the button will insert the bot's username and the specified
     * inline query in the current chat's input field. Can be empty, in which case only the bot's username
     * will be inserted.
     */
    public ?string $switchInlineQueryCurrentChat = null;

    /** Optional. Description of the game that will be launched when the user presses the button. */
    public array|CallbackGame|null $callbackGame = null;

    /**
     * Optional. Specify True, to send a Pay button.
     * NOTE: This type of button must always be the first button in the first row.
     */
    public ?bool $pay = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'loginUrl' => LoginUrl::class,
            'callbackGame' => CallbackGame::class
        ];
    }
}
