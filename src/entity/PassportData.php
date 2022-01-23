<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:55:49
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains information about Telegram Passport data shared with the bot by the user.
 *
 * @link https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends TelegramEntity
{
    /**
     * @var EncryptedPassportElement[]|null Array with information about documents and other Telegram Passport
     * elements that was shared with the bot
     */
    public ?array $data = null;

    /** Encrypted credentials required to decrypt the data */
    public array|EncryptedCredentials|null $credentials = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'data' => [EncryptedPassportElement::class],
            'credentials' => EncryptedCredentials::class
        ];
    }
}
