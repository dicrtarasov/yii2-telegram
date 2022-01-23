<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:15:09
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a video file.
 */
class Video extends TelegramEntity
{
    /** Identifier for this file, which can be used to download or reuse the file */
    public ?string $fileId = null;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public ?string $fileUniqueId = null;

    /** Video width as defined by sender */
    public ?int $width = null;

    /** Video height as defined by sender */
    public ?int $height = null;

    /** Duration of the video in seconds as defined by sender */
    public ?int $duration = null;

    /** Optional. Video thumbnail */
    public array|PhotoSize|null $thumb = null;

    /** Optional. Mime type of a file as defined by sender */
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
