<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:38:41
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a point on the map.
 *
 * @link https://core.telegram.org/bots/api#location
 */
class Location extends TelegramEntity
{
    /** Longitude as defined by sender */
    public ?float $longitude = null;

    /** Latitude as defined by sender */
    public ?float $latitude = null;
}
