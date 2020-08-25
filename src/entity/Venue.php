<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:42:53
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a venue.
 *
 * @link https://core.telegram.org/bots/api#venue
 */
class Venue extends TelegramEntity
{
    /** @var Location Venue location */
    public $location;

    /** @var string Name of the venue */
    public $title;

    /** @var string Address of the venue */
    public $address;

    /** @var ?string Optional. Foursquare identifier of the venue */
    public $foursquareId;

    /**
     * @var ?string Optional. Foursquare type of the venue.
     * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     */
    public $foursquareType;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'location' => Location::class
        ];
    }
}
