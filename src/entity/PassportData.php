<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:57:30
 */

declare(strict_types = 1);

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
     * @var EncryptedPassportElement[] Array with information about documents and other Telegram Passport
     * elements that was shared with the bot
     */
    public $data;

    /**
     * @var EncryptedCredentials Encrypted credentials required to decrypt the data
     */
    public $credentials;

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
