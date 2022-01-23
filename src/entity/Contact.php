<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:25:55
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a phone contact.
 */
class Contact extends TelegramEntity
{
    /** Contact's phone number */
    public ?string $phoneNumber = null;

    /** Contact's first name */
    public ?string $firstName = null;

    /** Optional. Contact's last name */
    public ?string $lastName = null;

    /** Optional. Contact's user identifier in Telegram */
    public ?int $userId = null;

    /** Optional. Additional data about the contact in the form of a vCard */
    public ?string $vcard = null;
}
