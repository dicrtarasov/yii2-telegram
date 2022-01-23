<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:05:17
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains information about an incoming shipping query.
 *
 * @link https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends TelegramEntity
{
    /** Unique query identifier */
    public ?string $id = null;

    /** User who sent the query */
    public array|User|null $from = null;

    /** Bot specified invoice payload */
    public ?string $invoicePayload = null;

    /** User specified shipping address */
    public array|ShippingAddress|null $shippingAddress = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'from' => User::class,
            'shippingAddress' => ShippingAddress::class
        ];
    }
}
