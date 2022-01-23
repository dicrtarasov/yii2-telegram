<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:16:54
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a voice note.
 *
 * @link https://core.telegram.org/bots/api#voice
 */
class Voice extends TelegramEntity
{
    /** Identifier for this file, which can be used to download or reuse the file */
    public ?string $fileId = null;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public ?string $fileUniqueId = null;

    /** Duration of the audio in seconds as defined by sender */
    public ?int $duration = null;

    /** Optional. MIME type of the file as defined by sender */
    public ?string $mimeType = null;

    /** Optional. File size */
    public ?int $fileSize = null;
}
