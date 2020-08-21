<?php

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Этот объект представляет из себя входящее обновление.
 * Под обновлением подразумевается действие, совершённое с ботом — например, получение сообщения от пользователя.
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
    public function setData(array $data)
    {
        $this->updateId = (int)$data['update_id'];

        if (! empty($data['message'])) {
            $this->message = new Message($data['message']);
        }

        if (! empty($data['edited_message'])) {
            $this->editedMessage = new Message($data['edited_message']);
        }

        if (! empty($data['channel_post'])) {
            $this->channelPost = new Message($data['channel_post']);
        }

        if (! empty($data['edited_channel_post'])) {
            $this->editedChannelPost = new Message($data['edited_channel_post']);
        }

        if (! empty($data['inline_query'])) {
            $this->inlineQuery = new InlineQuery($data['inline_query']);
        }

        if (! empty($data['chosen_inline_result'])) {
            $this->chosenInlineResult = new ChosenInlineResult($data['chosen_inline_result']);
        }

        if (! empty($data['callback_query'])) {
            $this->inlineQuery = new InlineQuery($data['callback_query']);
        }

        if (! empty($data['shipping_query'])) {
            $this->shippingQuery = new ShippingQuery($data['shipping_query']);
        }

        if (! empty($data['pre_checkout_query'])) {
            $this->preCheckoutQuery = new PreCheckoutQuery($data['pre_checkout_query']);
        }

        if (! empty($data['poll'])) {
            $this->poll = new Poll($data['poll']);
        }

        if (! empty($data['poll_answer'])) {
            $this->pollAnswer = new PollAnswer($data['poll_answer']);
        }
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return [
            'update_id' => $this->updateId,
            'message' => ! empty($this->message) ? $this->message->data : null,
            'inline_query' => ! empty($this->inlineQuery) ? $this->inlineQuery->data : null,
            'chosen_inline_result' => ! empty($this->choosenInlineResult) ? $this->choosenInlineResult->data : null,
            'callback_query' => ! empty($this->callbackQuery) ? $this->callbackQuery->data : null
        ];
    }
}
