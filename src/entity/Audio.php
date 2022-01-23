<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:14:04
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @link https://core.telegram.org/bots/api#audio
 */
class Audio extends TelegramEntity
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

    /** Optional. Performer of the audio as defined by sender or by audio tags */
    public ?string $performer = null;

    /** Optional. Title of the audio as defined by sender or by audio tags */
    public ?string $title = null;

    /** Optional. MIME type of the file as defined by sender */
    public ?string $mimeType = null;

    /** Optional. File size */
    public ?int $fileSize = null;

    /** Optional. Thumbnail of the album cover to which the music file belongs */
    public array|PhotoSize|null $thumb = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'thumb' => PhotoSize::class
        ];
    }
}
