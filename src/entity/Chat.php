<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:20:37
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
    public const TYPE_PRIVATE = 'private';

    public const TYPE_GROUP = 'group';

    public const TYPE_SUPERGROUP = 'supergroup';

    /** тип чата - канал */
    public const TYPE_CHANNEL = 'channel';

    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a
     * signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    public ?int $id = null;

    /** Type of chat, can be either “private”, “group”, “supergroup” or “channel” */
    public ?string $type = null;

    /** Optional. Title, for supergroups, channels and group chats */
    public ?string $title = null;

    /** Optional. Username, for private chats, supergroups and channels if available */
    public ?string $userName = null;

    /** Optional. First name of the other party in a private chat */
    public ?string $firstName = null;

    /** Optional. Last name of the other party in a private chat */
    public ?string $lastName = null;

    /** Optional. Chat photo. Returned only in getChat. */
    public array|ChatPhoto|null $photo = null;

    /** Optional. Description, for groups, supergroups and channel chats. Returned only in getChat. */
    public ?string $description = null;

    /**
     * Optional. Chat invite link, for groups, supergroups and channel chats. Each administrator
     * in a chat generates their own invite links, so the bot must first generate the link using
     * exportChatInviteLink. Returned only in getChat.
     */
    public ?string $inviteLink = null;

    /** Pinned message, for groups, supergroups and channels. Returned only in getChat. */
    public array|Message|null $pinnedMessage = null;

    /**
     * Optional. Default chat member permissions, for groups and supergroups.
     * Returned only in getChat.
     */
    public array|ChatPermissions|null $permissions = null;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each
     * unprivileged user. Returned only in getChat.
     */
    public ?int $slowModeDelay = null;

    /** Optional. For supergroups, name of group sticker set. Returned only in getChat. */
    public ?string $stickerSetName = null;

    /** Optional. True, if the bot can change the group sticker set. Returned only in getChat. */
    public ?bool $canSetStickerSet = null;

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
