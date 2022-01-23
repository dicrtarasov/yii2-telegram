<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:55:14
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents information about an order.
 *
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends TelegramEntity
{
    /** Optional. User name */
    public ?string $name = null;

    /** Optional. User's phone number */
    public ?string $phoneNumber = null;

    /** Optional. User email */
    public ?string $email = null;

    /** Optional. User shipping address */
    public array|ShippingAddress|null $shippingAddress = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'shippingAddress' => ShippingAddress::class
        ];
    }
}
