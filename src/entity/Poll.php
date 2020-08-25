<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:06:42
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
    /** @var string */
    public const TYPE_REGULAR = 'regular';

    /** @var string */
    public const TYPE_QUIZ = 'quiz';

    /** @var string Unique poll identifier */
    public $id;

    /** @var string Poll question, 1-255 characters */
    public $question;

    /** @var PollOption[] List of poll options */
    public $options;

    /** @var int Total number of users that voted in the poll */
    public $totalVoterCount;

    /** @var bool True, if the poll is closed */
    public $isClosed;

    /** @var bool True, if the poll is anonymous */
    public $isAnonymous;

    /** @var string Poll type, currently can be “regular” or “quiz” */
    public $type;

    /** @var bool True, if the poll allows multiple answers */
    public $allowsMultipleAnswers;

    /**
     * @var ?int Optional. 0-based identifier of the correct answer option. Available only for polls
     * in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private
     * chat with the bot.
     */
    public $correctOptionId;

    /**
     * @var ?string Optional. Text that is shown when a user chooses an incorrect answer or taps on the
     * lamp icon in a quiz-style poll, 0-200 characters
     */
    public $explanation;

    /**
     * @var ?MessageEntity[] Optional. Special entities like usernames, URLs, bot commands, etc.
     * that appear in the explanation
     */
    public $explanationEntities;

    /**
     * @var ?int Optional. Amount of time in seconds the poll will be active after creation
     */
    public $openPeriod;

    /**
     * @var ?int Optional. Point in time (Unix timestamp) when the poll will be automatically closed.
     */
    public $closeDate;

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
