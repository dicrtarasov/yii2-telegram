<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:04:31
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a game. Use BotFather to create and edit games,
 * their short names will act as unique identifiers.
 *
 * @link https://core.telegram.org/bots/api#game
 */
class Game extends TelegramEntity
{
    /** @var string Title of the game */
    public $title;

    /** @var string Description of the game */
    public $description;

    /** @var PhotoSize[] Photo that will be displayed in the game message in chats. */
    public $photo;

    /**
     * @var ?string Optional. Brief description of the game or high scores included in the game message.
     * Can be automatically edited to include current high scores for the game when the bot calls setGameScore,
     * or manually edited using editMessageText. 0-4096 characters.
     */
    public $text;

    /**
     * @var ?MessageEntity[] Optional. Special entities that appear in text, such as usernames, URLs,
     * bot commands, etc.
     */
    public $textEntities;

    /**
     * @var ?Animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     */
    public $animation;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
            'textEntities' => [MessageEntity::class],
            'animation' => Animation::class
        ];
    }
}
