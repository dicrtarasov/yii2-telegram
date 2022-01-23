<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:13:07
 */

declare(strict_types=1);
namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Class User.
 * This object represents a Telegram user or bot.
 *
 * @link https://core.telegram.org/bots/api#user
 */
class User extends TelegramEntity
{
    /** Unique identifier for this user or bot */
    public ?int $id = null;

    /** True, if this user is a bot */
    public ?bool $isBot = null;

    /** User‘s or bot’s first name */
    public ?string $firstName = null;

    /** User‘s or bot’s last name */
    public ?string $lastName = null;

    /** User‘s or bot’s username */
    public ?string $userName = null;

    /** IETF language tag of the user's language */
    public ?string $languageCode = null;

    /** True, if the bot can be invited to groups. Returned only in getMe. */
    public ?bool $canJoinGroups = null;

    /** True, if privacy mode is disabled for the bot. Returned only in getMe. */
    public ?bool $canReadAllGroupMessages = null;

    /** True, if the bot supports inline queries. Returned only in getMe. */
    public ?bool $supportsInlineQueries = null;

    /**
     * @inheritDoc
     */
    public function attributeFields(): array
    {
        $fields = parent::attributeFields();

        // дополнительные подмены
        $fields['userName'] = 'username';

        return $fields;
    }
}
