<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:14:40
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a shipping address.
 *
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends TelegramEntity
{
    /** @var string ISO 3166-1 alpha-2 country code */
    public $countryCode;

    /** @var string State, if applicable */
    public $state;

    /** @var string City */
    public $city;

    /** @var string First line for the address */
    public $streetLine1;

    /** @var string Second line for the address */
    public $streetLine2;

    /** @var string Address post code */
    public $postCode;
}
