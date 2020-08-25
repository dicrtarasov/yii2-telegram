<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:17:08
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents information about an order.
 *
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends TelegramEntity
{
    /** @var ?string Optional. User name */
    public $name;

    /** @var ?string Optional. User's phone number */
    public $phoneNumber;

    /** @var ?string Optional. User email */
    public $email;

    /** @var ?ShippingAddress Optional. User shipping address */
    public $shippingAddress;

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
