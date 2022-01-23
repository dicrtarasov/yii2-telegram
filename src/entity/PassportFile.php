<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:57:16
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are
 * in JPEG format when decrypted and don't exceed 10MB.
 *
 * @link https://core.telegram.org/bots/api#passportfile
 */
class PassportFile extends TelegramEntity
{
    /** Identifier for this file, which can be used to download or reuse the file */
    public ?string $fileId = null;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     */
    public ?string $fileUniqueId = null;

    /** File size */
    public ?int $fileSize = null;

    /** Unix time when the file was uploaded */
    public ?int $fileDate = null;
}
