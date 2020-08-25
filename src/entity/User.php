<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 15:54:55
 */

declare(strict_types = 1);
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
    /** @var int Unique identifier for this user or bot */
    public $id;

    /** @var bool True, if this user is a bot */
    public $isBot;

    /** @var string User‘s or bot’s first name */
    public $firstName;

    /** @var ?string User‘s or bot’s last name */
    public $lastName;

    /** @var ?string User‘s or bot’s username */
    public $userName;

    /** @var ?string IETF language tag of the user's language */
    public $languageCode;

    /** @var ?bool True, if the bot can be invited to groups. Returned only in getMe. */
    public $canJoinGroups;

    /** @var ?bool True, if privacy mode is disabled for the bot. Returned only in getMe. */
    public $canReadAllGroupMessages;

    /** @var ?bool True, if the bot supports inline queries. Returned only in getMe. */
    public $supportsInlineQueries;

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
