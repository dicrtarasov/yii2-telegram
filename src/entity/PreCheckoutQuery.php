<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:18:24
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends TelegramEntity
{
    /** @var string Unique query identifier */
    public $id;

    /** @var User User who sent the query */
    public $from;

    /** @var string Three-letter ISO 4217 currency code */
    public $currency;

    /**
     * @var int Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public $totalAmount;

    /** @var string Bot specified invoice payload */
    public $invoicePayload;

    /** @var ?string Optional. Identifier of the shipping option chosen by the user */
    public $shippingOptionId;

    /** @var ?OrderInfo Optional. Order info provided by the user */
    public $orderInfo;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'from' => User::class,
            'orderInfo' => OrderInfo::class
        ];
    }
}
