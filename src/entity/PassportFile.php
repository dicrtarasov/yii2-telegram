<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:41:49
 */

declare(strict_types = 1);

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
    /** @var string Identifier for this file, which can be used to download or reuse the file */
    public $fileId;

    /**
     * @var string Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     */
    public $fileUniqueId;

    /** @var int File size */
    public $fileSize;

    /** @var int Unix time when the file was uploaded */
    public $fileDate;
}
