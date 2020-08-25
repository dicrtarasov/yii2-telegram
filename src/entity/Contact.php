<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:43:21
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a phone contact.
 */
class Contact extends TelegramEntity
{
    /** @var string Contact's phone number */
    public $phoneNumber;

    /** @var string Contact's first name */
    public $firstName;

    /** @var ?string Optional. Contact's last name */
    public $lastName;

    /** @var ?int Optional. Contact's user identifier in Telegram */
    public $userId;

    /** @var ?string Optional. Additional data about the contact in the form of a vCard */
    public $vcard;
}
