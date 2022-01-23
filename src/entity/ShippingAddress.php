<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:04:35
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a shipping address.
 *
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends TelegramEntity
{
    /** ISO 3166-1 alpha-2 country code */
    public ?string $countryCode = null;

    /** State, if applicable */
    public ?string $state = null;

    /** City */
    public ?string $city = null;

    /** First line for the address */
    public ?string $streetLine1 = null;

    /** Second line for the address */
    public ?string $streetLine2 = null;

    /** Address post code */
    public ?string $postCode = null;
}
