<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:01:48
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
    /** Unique query identifier */
    public ?string $id = null;

    /** User who sent the query */
    public array|User|null $from = null;

    /** Three-letter ISO 4217 currency code */
    public ?string $currency = null;

    /**
     * Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public ?int $totalAmount = null;

    /** Bot specified invoice payload */
    public ?string $invoicePayload = null;

    /** Optional. Identifier of the shipping option chosen by the user */
    public ?string $shippingOptionId = null;

    /** Optional. Order info provided by the user */
    public array|OrderInfo|null $orderInfo = null;

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
