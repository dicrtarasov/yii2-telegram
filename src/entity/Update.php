<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:39:48
 */

declare(strict_types = 1);

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
     * @var int
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to
     * ignore repeated updates or to restore the correct update sequence, should they get out of order.
     */
    public $updateId;

    /**
     * @var ?Message
     * Опционально. New incoming message of any kind — text, photo, sticker, etc.
     */
    public $message;

    /**
     * @var ?Message
     * Optional. New version of a message that is known to the bot and was edited
     */
    public $editedMessage;

    /**
     * @var ?Message
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    public $channelPost;

    /**
     * @var ?Message
     * Optional. New version of a channel post that is known to the bot and was edited.
     */
    public $editedChannelPost;

    /**
     * @var ?InlineQuery
     * Опционально. New incoming inline query.
     */
    public $inlineQuery;

    /**
     * @var ?ChosenInlineResult
     * Опционально. The result of an inline query that was chosen by a user and sent to their chat partner.
     */
    public $chosenInlineResult;

    /**
     * @var ?CallbackQuery
     * Опционально. New incoming callback query.
     */
    public $callbackQuery;

    /**
     * @var ?ShippingQuery
     * Optional. New incoming shipping query. Only for invoices with flexible price.
     */
    public $shippingQuery;

    /**
     * @var ?PreCheckoutQuery
     * Optional. New incoming pre-checkout query. Contains full information about checkout
     */
    public $preCheckoutQuery;

    /**
     * @var ?Poll
     * Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot.
     */
    public $poll;

    /**
     * @var ?PollAnswer
     * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that
     * were sent by the bot itself.
     */
    public $pollAnswer;

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
