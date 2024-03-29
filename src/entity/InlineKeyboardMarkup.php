<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:35:10
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends TelegramEntity
{
    /**
     * @var InlineKeyboardButton[][]|null Array of Array of InlineKeyboardButton
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects.
     */
    public ?array $inlineKeyboard = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'inlineKeyboard' => static function ($data) {
                foreach ($data as &$row) {
                    foreach ($row as &$button) {
                        $entity = new InlineKeyboardButton();
                        $entity->setJson($button);
                        $button = $entity;
                    }
                }

                return $data;
            }
        ];
    }
}
