<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:07:59
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains basic information about a successful payment.
 *
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends TelegramEntity
{
    /** Three-letter ISO 4217 currency code */
    public ?string $currency = null;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example,
     * for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the
     * number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public ?int $totalAmount = null;

    /** Bot specified invoice payload */
    public ?string $invoicePayload = null;

    /** Optional. Identifier of the shipping option chosen by the user */
    public ?string $shippingOptionId = null;

    /** Optional. Order info provided by the user */
    public array|OrderInfo|null $orderInfo = null;

    /** Telegram payment identifier */
    public ?string $telegramPaymentChargeId = null;

    /** Provider payment identifier */
    public ?string $providerPaymentChargeId = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'orderInfo' => OrderInfo::class
        ];
    }
}
