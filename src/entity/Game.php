<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:33:06
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
    /** Title of the game */
    public ?string $title = null;

    /** Description of the game */
    public ?string $description = null;

    /** @var PhotoSize[]|null Photo that will be displayed in the game message in chats. */
    public ?array $photo = null;

    /**
     * Optional. Brief description of the game or high scores included in the game message.
     * Can be automatically edited to include current high scores for the game when the bot calls setGameScore,
     * or manually edited using editMessageText. 0-4096 characters.
     */
    public ?string $text = null;

    /**
     * @var MessageEntity[]|null Optional. Special entities that appear in text, such as usernames, URLs,
     * bot commands, etc.
     */
    public ?array $textEntities = null;

    /** Optional. Animation that will be displayed in the game message in chats. Upload via BotFather */
    public array|Animation|null $animation = null;

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
