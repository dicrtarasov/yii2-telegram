<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:13:55
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a venue.
 *
 * @link https://core.telegram.org/bots/api#venue
 */
class Venue extends TelegramEntity
{
    /** Venue location */
    public array|Location|null $location = null;

    /** Name of the venue */
    public ?string $title = null;

    /** Address of the venue */
    public ?string $address = null;

    /** Optional. Foursquare identifier of the venue */
    public ?string $foursquareId = null;

    /**
     * Optional. Foursquare type of the venue.
     * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     */
    public ?string $foursquareType = null;

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
