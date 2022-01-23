<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:59:36
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains information about a poll.
 *
 * @link https://core.telegram.org/bots/api#poll
 */
class Poll extends TelegramEntity
{
    public const TYPE_REGULAR = 'regular';

    public const TYPE_QUIZ = 'quiz';

    /** Unique poll identifier */
    public ?string $id = null;

    /** Poll question, 1-255 characters */
    public ?string $question = null;

    /** @var PollOption[]|null List of poll options */
    public ?array $options = null;

    /** Total number of users that voted in the poll */
    public ?int $totalVoterCount = null;

    /** True, if the poll is closed */
    public ?bool $isClosed = null;

    /** True, if the poll is anonymous */
    public ?bool $isAnonymous = null;

    /** Poll type, currently can be “regular” or “quiz” */
    public ?string $type = null;

    /** True, if the poll allows multiple answers */
    public ?bool $allowsMultipleAnswers = null;

    /**
     * Optional. 0-based identifier of the correct answer option. Available only for polls
     * in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private
     * chat with the bot.
     */
    public ?int $correctOptionId = null;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps on the
     * lamp icon in a quiz-style poll, 0-200 characters
     */
    public ?string $explanation = null;

    /**
     * @var MessageEntity[]|null Optional. Special entities like usernames, URLs, bot commands, etc.
     * that appear in the explanation
     */
    public ?array $explanationEntities = null;

    /** Optional. Amount of time in seconds the poll will be active after creation */
    public ?int $openPeriod = null;

    /** Optional. Point in time (Unix timestamp) when the poll will be automatically closed. */
    public ?int $closeDate;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'options' => [PollOption::class],
            'explanationEntities' => [MessageEntity::class]
        ];
    }
}
