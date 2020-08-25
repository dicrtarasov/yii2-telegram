<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:55:02
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends TelegramEntity
{
    /**
     * @var ?bool Optional. True, if the user is allowed to send text messages, contacts, locations and venues
     */
    public $canSendMessages;

    /**
     * @var ?bool Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes
     * and voice notes, implies can_send_messages
     */
    public $canSendMediaMessages;

    /** @var ?bool Optional. True, if the user is allowed to send polls, implies can_send_messages */
    public $canSendPolls;

    /**
     * @var ?bool Optional. True, if the user is allowed to send animations, games, stickers and use inline bots,
     * implies can_send_media_messages
     */
    public $canSendOtherMessages;

    /**
     * @var ?bool Optional. True, if the user is allowed to add web page previews to their messages, implies
     * can_send_media_messages
     */
    public $canAddWebPagePreviews;

    /**
     * @var ?bool Optional. True, if the user is allowed to change the chat title, photo and other settings.
     * Ignored in public supergroups
     */
    public $canChangeInfo;

    /**
     * @var ?bool Optional. True, if the user is allowed to invite new users to the chat
     */
    public $canInviteUsers;

    /**
     * @var ?bool Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     */
    public $canPinMessages;
}
