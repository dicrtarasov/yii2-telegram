<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:55:24
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Chat Entity.
 * This object represents a chat.
 *
 * @link https://core.telegram.org/bots/api#chat
 */
class Chat extends TelegramEntity
{
    /** @var string */
    public const TYPE_PRIVATE = 'private';

    /** @var string */
    public const TYPE_GROUP = 'group';

    /** @var string */
    public const TYPE_SUPERGROUP = 'supergroup';

    /** @var string тип чата - канал */
    public const TYPE_CHANNEL = 'channel';

    /** @var int ID чата */
    public $id;

    /** @var string Type of chat, can be either “private”, “group”, “supergroup” or “channel” */
    public $type;

    /** @var ?string Title, for supergroups, channels and group chats */
    public $title;

    /** @var ?string Username, for private chats, supergroups and channels if available */
    public $userName;

    /** @var ?string First name of the other party in a private chat */
    public $firstName;

    /** @var ?string Last name of the other party in a private chat */
    public $lastName;

    /** @var ?ChatPhoto Chat photo. Returned only in getChat. */
    public $photo;

    /** @var ?string Description, for groups, supergroups and channel chats. Returned only in getChat. */
    public $description;

    /** @var ?string Chat invite link, for groups, supergroups and channel chats. Each administrator in a chat
     * generates their own invite links, so the bot must first generate the link using exportChatInviteLink.
     * Returned only in getChat. */
    public $inviteLink;

    /** @var Message|null Pinned message, for groups, supergroups and channels.
     * Returned only in getChat. */
    public $pinnedMessage;

    /** @var ChatPermissions|null Default chat member permissions, for groups
     * and supergroups. Returned only in getChat. */
    public $permissions;

    /** @var int|null For supergroups, the minimum allowed delay between consecutive messages sent by each
     * unprivileged user. Returned only in getChat. */
    public $slowModeDelay;

    /** @var string|null For supergroups, name of group sticker set. Returned only in getChat. */
    public $stickerSetName;

    /** @var bool|null True, if the bot can change the group sticker set. Returned only in getChat. */
    public $canSetStickerSet;

    /**
     * @inheritDoc
     */
    public function setData(array $data)
    {
        $this->id = (int)$data['id'];
        $this->type = (string)$data['type'];
        $this->title = isset($data['title']) ? (string)$data['title'] : null;
        $this->userName = isset($data['username']) ? (string)$data['username'] : null;
        $this->firstName = isset($data['first_name']) ? (string)$data['first_name'] : null;
        $this->lastName = isset($data['last_name']) ? (string)$data['last_name'] : null;
        $this->photo = isset($data['photo']) ? new ChatPhoto($data['photo']) : null;
        $this->description = isset($data['description']) ? (string)$data['description'] : null;
        $this->inviteLink = isset($data['invite_link']) ? (string)$data['invite_link'] : null;
        $this->pinnedMessage = isset($data['pinned_message']) ? new Message($data['pinned_message']) : null;
        $this->permissions = isset($data['permissions']) ? new ChatPermissions($data['permissions']) : null;
        $this->slowModeDelay = isset($data['slow_mode_delay']) ? (int)$data['slow_mode_delay'] : null;
        $this->stickerSetName = isset($data['sticker_set_name']) ? (string)$data['sticker_set_name'] : null;
        $this->canSetStickerSet = isset($data['can_set_sticker_set']) ? (bool)$data['can_set_sticker_set'] : null;
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return [
            'id' => (int)$this->id,
            'type' => (string)$this->type,
            'title' => isset($this->title) ? (string)$this->title : null,
            'username' => isset($this->userName) ? (string)$this->userName : null,
            'first_name' => isset($this->firstName) ? (string)$this->firstName : null,
            'last_name' => isset($this->lastName) ? (string)$this->lastName : null,
            'photo' => isset($this->photo) ? $this->photo->getData() : null,
            'description' => isset($this->description) ? (string)$this->description : null,
            'invite_link' => isset($this->inviteLink) ? (string)$this->inviteLink : null,
            'pinned_message' => isset($this->pinnedMessage) ? $this->pinnedMessage->getData() : null,
            'permissions' => isset($this->permissions) ? $this->permissions->getData() : null,
            'slow_mode_delay' => isset($this->slowModeDelay) ? (int)$this->slowModeDelay : null,
            'sticker_set_name' => isset($this->stickerSetName) ? (string)$this->stickerSetName : null,
            'can_set_sticker_set' => isset($this->canSetStickerSet) ? (string)$this->canSetStickerSet : null
        ];
    }
}
