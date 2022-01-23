<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:37:09
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains basic information about an invoice.
 *
 * @link https://core.telegram.org/bots/api#invoice
 */
class Invoice extends TelegramEntity
{
    /** Product name */
    public ?string $title = null;

    /** Product description */
    public ?string $description = null;

    /** Unique bot deep-linking parameter that can be used to generate this invoice */
    public ?string $startParameter = null;

    /** Three-letter ISO 4217 currency code */
    public ?string $currency = null;

    /**
     * Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public ?int $totalAmount = null;
}
