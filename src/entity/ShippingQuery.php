<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:21:08
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
    /** @var string Unique query identifier */
    public $id;

    /** @var User User who sent the query */
    public $from;

    /** @var string Bot specified invoice payload */
    public $invoicePayload;

    /** @var ?ShippingAddress User specified shipping address */
    public $shippingAddress;

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
