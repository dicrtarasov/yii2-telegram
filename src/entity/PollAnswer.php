<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:09:09
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
    /** @var string Unique poll identifier */
    public $pollId;

    /** @var User The user, who changed the answer to the poll */
    public $user;

    /**
     * @var int[] 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their
     * vote.
     */
    public $optionIds;

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
