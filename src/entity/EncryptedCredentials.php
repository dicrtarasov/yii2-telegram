<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:28:19
 */

declare(strict_types=1);

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
     * Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes
     * and secrets required for EncryptedPassportElement decryption and authentication
     */
    public ?string $data = null;

    /** Base64-encoded data hash for data authentication */
    public ?string $hash = null;

    /** Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption */
    public ?string $secret = null;
}
