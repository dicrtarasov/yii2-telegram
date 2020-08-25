<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:43:32
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @link https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends TelegramEntity
{
    /** @var string */
    public $fileId;

    /**
     * @var string Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $fileUniqueId;

    /** @var int Video width and height (diameter of the video message) as defined by sender */
    public $length;

    /** @var int Duration of the video in seconds as defined by sender */
    public $duration;

    /** @var ?PhotoSize Optional. Video thumbnail */
    public $thumb;

    /** @var ?int Optional. File size */
    public $fileSize;

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
