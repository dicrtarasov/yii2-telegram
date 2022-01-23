<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:31:46
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains information about documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends TelegramEntity
{
    public const TYPE_PERSONAL_DETAILS = 'personal_details';

    public const TYPE_PASSPORT = 'passport';

    public const TYPE_DRIVER_LICENSE = 'driver_license';

    public const TYPE_IDENTITY_CARD = 'identity_card';

    public const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    public const TYPE_ADDRESS = 'address';

    public const TYPE_UTILITY_BILL = 'utility_bill';

    public const TYPE_BANK_STATEMENT = 'bank_statement';

    public const TYPE_RENTAL_AGREEMENT = 'rental_agreement';

    public const TYPE_PASSPORT_REGISTRATION = 'passport_registration';

    public const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';

    public const TYPE_PHONE_NUMBER = 'phone_number';

    public const TYPE_EMAIL = 'email';

    /**
     * Element type. One of “personal_details”, “passport”, “driver_license”,
     * “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”,
     * “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
     */
    public ?string $type = null;

    /**
     * Optional. Base64-encoded encrypted Telegram Passport element data provided by the user,
     * available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”
     * and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public ?string $data = null;

    /** Optional. User's verified phone number, available only for “phone_number” type */
    public ?string $phoneNumber = null;

    /** Optional. User's verified email address, available only for “email” type */
    public ?string $email = null;

    /**
     * @var PassportFile[]|null Optional. Array of encrypted files with documents provided by the user,
     * available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”
     * and “temporary_registration” types. Files can be decrypted and verified using the accompanying
     * EncryptedCredentials.
     */
    public ?array $files = null;

    /**
     * Optional. Encrypted file with the front side of the document, provided by the user.
     * Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be
     * decrypted and verified using the accompanying EncryptedCredentials.
     */
    public array|PassportFile|null $frontSide = null;

    /**
     * Optional. Encrypted file with the reverse side of the document, provided by the user.
     * Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the
     * accompanying EncryptedCredentials.
     */
    public array|PassportFile|null $reverseSide = null;

    /**
     * Optional. Encrypted file with the selfie of the user holding a document, provided
     * by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”.
     * The file can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public array|PassportFile|null $selfie = null;

    /**
     * @var PassportFile[]|null Optional. Array of encrypted files with translated versions of documents provided
     * by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”,
     * “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration”
     * types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     */
    public ?array $translation = null;

    /** Base64-encoded element hash for using in PassportElementErrorUnspecified */
    public ?string $hash = null;

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
