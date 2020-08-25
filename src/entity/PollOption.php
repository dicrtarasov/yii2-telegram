<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:09:23
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
    /** @var string Option text, 1-100 characters */
    public $text;

    /** @var int Number of users that voted for this option */
    public $voterCount;
}
