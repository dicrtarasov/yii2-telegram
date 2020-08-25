<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:52:47
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains information about documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends TelegramEntity
{
    /** @var string */
    public const TYPE_PERSONAL_DETAILS = 'personal_details';

    /** @var string */
    public const TYPE_PASSPORT = 'passport';

    /** @var string */
    public const TYPE_DRIVER_LICENSE = 'driver_license';

    /** @var string */
    public const TYPE_IDENTITY_CARD = 'identity_card';

    /** @var string */
    public const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    /** @var string */
    public const TYPE_ADDRESS = 'address';

    /** @var string */
    public const TYPE_UTILITY_BILL = 'utility_bill';

    /** @var string */
    public const TYPE_BANK_STATEMENT = 'bank_statement';

    /** @var string */
    public const TYPE_RENTAL_AGREEMENT = 'rental_agreement';

    /** @var string */
    public const TYPE_PASSPORT_REGISTRATION = 'passport_registration';

    /** @var string */
    public const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';

    /** @var string */
    public const TYPE_PHONE_NUMBER = 'phone_number';

    /** @var string */
    public const TYPE_EMAIL = 'email';

    /**
     * @var string Element type. One of “personal_details”, “passport”, “driver_license”,
     * “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”,
     * “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
     */
    public $type;

    /**
     * @var ?string Optional. Base64-encoded encrypted Telegram Passport element data provided by the user,
     * available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”
     * and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public $data;

    /**
     * @var ?string Optional. User's verified phone number, available only for “phone_number” type
     */
    public $phoneNumber;

    /**
     * @var ?string Optional. User's verified email address, available only for “email” type
     */
    public $email;

    /**
     * @var ?PassportFile[] Optional. Array of encrypted files with documents provided by the user,
     * available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”
     * and “temporary_registration” types. Files can be decrypted and verified using the accompanying
     * EncryptedCredentials.
     */
    public $files;

    /**
     * @var ?PassportFile Optional. Encrypted file with the front side of the document, provided by the user.
     * Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be
     * decrypted and verified using the accompanying EncryptedCredentials.
     */
    public $frontSide;

    /**
     * @var ?PassportFile Optional. Encrypted file with the reverse side of the document, provided by the user.
     * Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the
     * accompanying EncryptedCredentials.
     */
    public $reverseSide;

    /**
     * @var ?PassportFile Optional. Encrypted file with the selfie of the user holding a document, provided
     * by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”.
     * The file can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public $selfie;

    /**
     * @var ?PassportFile[] Optional. Array of encrypted files with translated versions of documents provided
     * by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”,
     * “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration”
     * types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public $translation;

    /**
     * @var string Base64-encoded element hash for using in PassportElementErrorUnspecified
     */
    public $hash;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'files' => [PassportFile::class],
            'frontSide' => PassportFile::class,
            'reverseSide' => PassportFile::class,
            'selfie' => PassportFile::class,
            'translation' => [PassportFile::class]
        ];
    }
}
