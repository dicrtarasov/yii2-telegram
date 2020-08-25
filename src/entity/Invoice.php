<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:34:02
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object contains basic information about an invoice.
 *
 * @link https://core.telegram.org/bots/api#invoice
 */
class Invoice extends TelegramEntity
{
    /** @var string Product name */
    public $title;

    /** @var string Product description */
    public $description;

    /** @var string Unique bot deep-linking parameter that can be used to generate this invoice */
    public $startParameter;

    /** @var string Three-letter ISO 4217 currency code */
    public $currency;

    /**
     * @var int Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public $totalAmount;
}
