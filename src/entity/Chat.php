<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:02:10
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

    /**
     * @var int Unique identifier for this chat. This number may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a
     * signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    public $id;

    /**
     * @var string Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    public $type;

    /**
     * @var ?string Optional. Title, for supergroups, channels and group chats
     */
    public $title;

    /**
     * @var ?string Optional. Username, for private chats, supergroups and channels if available
     */
    public $userName;

    /**
     * @var ?string Optional. First name of the other party in a private chat
     */
    public $firstName;

    /**
     * @var ?string Optional. Last name of the other party in a private chat
     */
    public $lastName;

    /**
     * @var ?ChatPhoto Optional. Chat photo. Returned only in getChat.
     */
    public $photo;

    /**
     * @var ?string Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     */
    public $description;

    /**
     * @var ?string Optional. Chat invite link, for groups, supergroups and channel chats. Each administrator
     * in a chat generates their own invite links, so the bot must first generate the link using
     * exportChatInviteLink. Returned only in getChat.
     */
    public $inviteLink;

    /**
     * @var ?Message Optional. Pinned message, for groups, supergroups and channels. Returned only in getChat.
     */
    public $pinnedMessage;

    /**
     * @var ?ChatPermissions Optional. Default chat member permissions, for groups and supergroups.
     * Returned only in getChat.
     */
    public $permissions;

    /**
     * @var ?int Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each
     * unprivileged user. Returned only in getChat.
     */
    public $slowModeDelay;

    /**
     * @var ?string Optional. For supergroups, name of group sticker set. Returned only in getChat.
     */
    public $stickerSetName;

    /**
     * @var ?bool Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     */
    public $canSetStickerSet;

    /**
     * @inheritDoc
     */
    public function attributeFields(): array
    {
        $fields = parent::attributeFields();
        $fields['userName'] = 'username';

        return $fields;
    }

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'photo' => ChatPhoto::class,
            'pinnedMessage' => Message::class,
            'permissions' => ChatPermissions::class
        ];
    }
}
