<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 23:27:42
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 *
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends TelegramEntity
{
    /**
     * @var KeyboardButton[][] Array of button rows, each represented by an Array of KeyboardButton objects
     */
    public $keyboard;

    /**
     * @var ?bool Optional. Requests clients to resize the keyboard vertically for optimal fit
     * (e.g., make the keyboard smaller if there are just two rows of buttons).
     * Defaults to false, in which case the custom keyboard is always of the same height as
     * the app's standard keyboard.
     */
    public $resizeKeyboard;

    /**
     * @var ?bool Optional. Requests clients to hide the keyboard as soon as it's been used.
     * The keyboard will still be available, but clients will automatically display the usual
     * letter-keyboard in the chat – the user can press a special button in the input field
     * to see the custom keyboard again. Defaults to false.
     */
    public $oneTimeKeyboard;

    /**
     * @var ?bool Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * Example: A user requests to change the bot's language, bot replies to the request with a keyboard
     * to select the new language. Other users in the group don't see the keyboard.
     */
    public $selective;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'keyboard' => static function ($data) {
                foreach ($data as &$row) {
                    foreach ($row as &$button) {
                        $entity = new KeyboardButton();
                        $entity->setJson($button);
                        $button = $entity;
                    }
                }

                return $data;
            }
        ];
    }
}
