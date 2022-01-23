<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:11:48
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @link https://core.telegram.org/bots/api#update
 */
class Update extends TelegramEntity
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to
     * ignore repeated updates or to restore the correct update sequence, should they get out of order.
     */
    public ?int $updateId = null;

    /** Опционально. New incoming message of any kind — text, photo, sticker, etc. */
    public array|Message|null $message = null;

    /** Optional. New version of a message that is known to the bot and was edited */
    public array|Message|null $editedMessage = null;

    /** Optional. New incoming channel post of any kind — text, photo, sticker, etc. */
    public array|Message|null $channelPost = null;

    /** Optional. New version of a channel post that is known to the bot and was edited. */
    public array|Message|null $editedChannelPost = null;

    /** Опционально. New incoming inline query. */
    public array|InlineQuery|null $inlineQuery = null;

    /** Опционально. The result of an inline query that was chosen by a user and sent to their chat partner. */
    public array|ChosenInlineResult|null $chosenInlineResult = null;

    /** Опционально. New incoming callback query. */
    public array|CallbackQuery|null $callbackQuery = null;

    /** Optional. New incoming shipping query. Only for invoices with flexible price. */
    public array|ShippingQuery|null $shippingQuery = null;

    /** Optional. New incoming pre-checkout query. Contains full information about checkout */
    public array|PreCheckoutQuery|null $preCheckoutQuery = null;

    /** Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot. */
    public array|Poll|null $poll = null;

    /**
     * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that
     * were sent by the bot itself.
     */
    public array|PollAnswer|null $pollAnswer = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'message' => Message::class,
            'editedMessage' => Message::class,
            'channelPost' => Message::class,
            'editedChannelPost' => Message::class,
            'inlineQuery' => InlineQuery::class,
            'chosenInlineResult' => ChosenInlineResult::class,
            'callbackQuery' => CallbackQuery::class,
            'shippingQuery' => ShippingQuery::class,
            'preCheckoutQuery' => PreCheckoutQuery::class,
            'poll' => Poll::class,
            'pollAnswer' => PollAnswer::class
        ];
    }
}
