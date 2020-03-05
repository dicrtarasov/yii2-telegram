<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.03.20 02:29:47
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

/**
 * Class ChatPermissions.
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @package app\modules\sitemon\components
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends BaseEntity
{
    /** @var bool|null True, if the user is allowed to send text messages, contacts, locations and venues */
    public $canSendMessages;

    /** @var bool|null True, if the user is allowed to send audios, documents, photos, videos, video notes and voice
     * notes, implies can_send_messages */
    public $canSendMediaMessages;

    /** @var bool|null True, if the user is allowed to send polls, implies can_send_messages */
    public $canSendPolls;

    /** @var bool|null True, if the user is allowed to send animations, games, stickers and use inline bots,
     * implies can_send_media_messages */
    public $canSendOtherMessages;

    /** @var bool|null True, if the user is allowed to add web page previews to their messages,
     * implies can_send_media_messages */
    public $canAddWebPagePreviews;

    /** @var bool|null True, if the user is allowed to change the chat title, photo and other settings.
     * Ignored in public supergroups */
    public $canChangeInfo;

    /** @var bool|null True, if the user is allowed to invite new users to the chat */
    public $canInviteUsers;

    /** @var bool|null True, if the user is allowed to pin messages. Ignored in public supergroups */
    public $canPinMessages;

    /**
     * @inheritDoc
     */
    public function configure(array $data)
    {
        $this->canSendMessages = isset($data['can_send_messages']) ? (bool)$data['can_send_messages'] : null;
        $this->canSendMediaMessages =
            isset($data['can_send_media_messages']) ? (bool)$data['can_send_media_messages'] : null;
        $this->canSendPolls = isset($data['can_send_polls']) ? (bool)$data['can_send_polls'] : null;
        $this->canSendOtherMessages =
            isset($data['can_send_other_messages']) ? (bool)$data['can_send_other_messages'] : null;
        $this->canAddWebPagePreviews =
            isset($data['can_add_web_page_previews']) ? (bool)$data['can_add_web_page_previews'] : null;
        $this->canChangeInfo = isset($data['can_change_info']) ? (bool)$data['can_change_info'] : null;
        $this->canInviteUsers = isset($data['can_invite_users']) ? (bool)$data['can_invite_users'] : null;
        $this->canPinMessages = isset($data['can_pin_messages']) ? (bool)$data['can_pin_messages'] : null;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toData()
    {
        return array_filter([
            'can_send_messages' => isset($this->canSendMessages) ? (bool)$this->canSendMessages : null,
            'can_send_media_messages' => isset($this->canSendMediaMessages) ? (bool)$this->canSendMediaMessages : null,
            'can_send_polls' => isset($this->canSendPolls) ? (bool)$this->canSendPolls : null,
            'can_send_other_messages' => isset($this->canSendOtherMessages) ? (bool)$this->canSendOtherMessages : null,

            'can_add_web_page_previews' => isset($this->canAddWebPagePreviews) ? (bool)$this->canAddWebPagePreviews :
                null,

            'can_change_info' => isset($this->canChangeInfo) ? (bool)$this->canChangeInfo : null,
            'can_invite_users' => isset($this->canInviteUsers) ? (bool)$this->canInviteUsers : null,
            'can_pin_messages' => isset($this->canPinMessages) ? (bool)$this->canPinMessages : null
        ], static function($val) {
            return $val !== null && $val !== '' && $val !== [];
        });
    }
}
