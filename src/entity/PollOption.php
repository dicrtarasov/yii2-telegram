<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:00:37
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains information about one answer option in a poll.
 *
 * @link https://core.telegram.org/bots/api#polloption
 */
class PollOption extends TelegramEntity
{
    /** Option text, 1-100 characters */
    public ?string $text = null;

    /** Number of users that voted for this option */
    public ?int $voterCount = null;
}
