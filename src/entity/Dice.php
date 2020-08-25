<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:44:18
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an animated emoji that displays a random value.
 */
class Dice extends TelegramEntity
{
    /** @var string Emoji on which the dice throw animation is based */
    public $emoji;

    /** @var int Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” base emoji */
    public $value;
}
