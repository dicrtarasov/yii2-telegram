<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:26:20
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an animated emoji that displays a random value.
 */
class Dice extends TelegramEntity
{
    /** Emoji on which the dice throw animation is based */
    public ?string $emoji = null;

    /** Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” base emoji */
    public ?int $value = null;
}
