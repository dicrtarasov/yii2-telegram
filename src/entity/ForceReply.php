<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 23:30:56
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to
 * the user (act as if the user has selected the bot's message and tapped 'Reply'). This can
 * be extremely useful if you want to create user-friendly step-by-step interfaces without
 * having to sacrifice privacy mode.
 *
 * @link https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends TelegramEntity
{
    /**
     * @var true Shows reply interface to the user, as if they manually selected the bot's message
     * and tapped 'Reply'
     */
    public $forceReply;

    /**
     * @var ?bool Optional. Use this parameter if you want to force reply from specific users only.
     *
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     */
    public $selective;
}
