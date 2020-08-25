<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:36:16
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a point on the map.
 *
 * @link https://core.telegram.org/bots/api#location
 */
class Location extends TelegramEntity
{
    /** @var float Longitude as defined by sender */
    public $longitude;

    /** @var float Latitude as defined by sender */
    public $latitude;
}
