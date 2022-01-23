<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:19:03
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @link https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends TelegramEntity
{
    /** Unique poll identifier */
    public ?string $pollId = null;

    /** The user, who changed the answer to the poll */
    public array|User|null $user = null;

    /**
     * @var int[]|null 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted
     *     their vote.
     */
    public ?array $optionIds = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'user' => User::class
        ];
    }
}
