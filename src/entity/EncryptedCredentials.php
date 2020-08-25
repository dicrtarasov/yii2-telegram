<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:56:06
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains data required for decrypting and authenticating EncryptedPassportElement. See the
 * Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 *
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials extends TelegramEntity
{
    /**
     * @var string Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes
     * and secrets required for EncryptedPassportElement decryption and authentication
     */
    public $data;

    /**
     * @var string Base64-encoded data hash for data authentication
     */
    public $hash;

    /**
     * @var string Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
     */
    public $secret;
}
