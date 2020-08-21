<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:56:17
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

    /** @var string|null User‘s or bot’s last name */
    public $lastName;

    /** @var string|null User‘s or bot’s username */
    public $userName;

    /** @var string|null IETF language tag of the user's language */
    public $languageCode;

    /** @var bool|null True, if the bot can be invited to groups. Returned only in getMe. */
    public $canJoinGroups;

    /** @var bool|null True, if privacy mode is disabled for the bot. Returned only in getMe. */
    public $canReadAllGroupMessages;

    /** @var bool|null True, if the bot supports inline queries. Returned only in getMe. */
    public $supportsInlineQueries;

    /**
     * @inheritDoc
     */
    public function setData(array $data)
    {
        $this->id = (int)$data['id'];
        $this->isBot = (bool)$data['is_bot'];
        $this->firstName = (string)$data['first_name'];
        $this->lastName = isset($data['last_name']) ? (string)$data['last_name'] : null;
        $this->userName = isset($data['username']) ? (string)$data['username'] : null;
        $this->languageCode = isset($data['language_code']) ? (string)$data['language_code'] : null;
        $this->canJoinGroups = isset($data['can_join_groups']) ? (bool)$data['can_join_groups'] : null;

        $this->canReadAllGroupMessages =
            isset($data['can_read_all_group_messages']) ? (bool)$data['can_read_all_group_messages'] : null;

        $this->supportsInlineQueries =
            isset($data['supports_inline_queries']) ? (bool)$data['supports_inline_queries'] : null;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return [
            'id' => (int)$this->id,
            'is_bot' => (bool)$this->isBot,
            'first_name' => (string)$this->firstName,
            'last_name' => isset($this->lastName) ? (string)$this->lastName : null,
            'username' => isset($this->userName) ? (string)$this->userName : null,
            'language_code' => isset($this->languageCode) ? (string)$this->languageCode : null,
            'can_join_groups' => isset($this->canJoinGroups) ? (bool)$this->canJoinGroups : null,
            'can_read_all_group_messages' => isset($this->canReadAllGroupMessages) ?
                (bool)$this->canReadAllGroupMessages : null,
            'supports_inline_queries' => isset($this->supportsInlineQueries) ? (bool)$this->supportsInlineQueries : null
        ];
    }
}
