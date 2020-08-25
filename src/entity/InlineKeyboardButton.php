<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:25:11
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
    /** @var string Label text on the button */
    public $text;

    /** @var ?string Optional. HTTP or tg:// url to be opened when button is pressed */
    public $url;

    /**
     * @var ?LoginUrl Optional. An HTTP URL used to automatically authorize the user. Can be used as a
     * replacement for the Telegram Login Widget.
     */
    public $loginUrl;

    /**
     * @var ?string Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     */
    public $callbackData;

    /**
     * @var ?string Optional. If set, pressing the button will prompt the user to select one of their chats,
     * open that chat and insert the bot's username and the specified inline query in the input field.
     * Can be empty, in which case just the bot's username will be inserted.
     *
     * Note: This offers an easy way for users to start using your bot in inline mode when they are currently
     * in a private chat with it. Especially useful when combined with switch_pm… actions – in this case the
     * user will be automatically returned to the chat they switched from, skipping the chat selection screen.
     */
    public $switchInlineQuery;

    /**
     * @var ?string Optional. If set, pressing the button will insert the bot's username and the specified
     * inline query in the current chat's input field. Can be empty, in which case only the bot's username
     * will be inserted.
     */
    public $switchInlineQueryCurrentChat;

    /**
     * @var ?CallbackGame Optional. Description of the game that will be launched when the user presses the button.
     */
    public $callbackGame;

    /**
     * @var ?bool Optional. Specify True, to send a Pay button.
     * NOTE: This type of button must always be the first button in the first row.
     */
    public $pay;

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
