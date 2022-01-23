<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:27:36
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 */
class Document extends TelegramEntity
{
    /** Identifier for this file, which can be used to download or reuse the file */
    public ?string $fileId = null;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public ?string $fileUniqueId = null;

    /** Optional. Document thumbnail as defined by sender */
    public array|PhotoSize|null $thumb = null;

    /** Optional. Original filename as defined by sender */
    public ?string $fileName = null;

    /** Optional. MIME type of the file as defined by sender */
    public ?string $mimeType = null;

    /** Optional. File size */
    public ?int $fileSize = null;

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
