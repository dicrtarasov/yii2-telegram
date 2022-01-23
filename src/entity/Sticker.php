<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:06:48
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a sticker.
 *
 * @link https://core.telegram.org/bots/api#sticker
 */
class Sticker extends TelegramEntity
{
    /** Identifier for this file, which can be used to download or reuse the file */
    public ?string $fileId = null;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public ?string $fileUniqueId = null;

    /** Sticker width */
    public ?int $width = null;

    /** Sticker height */
    public ?int $height = null;

    /** True, if the sticker is animated */
    public ?bool $isAnimated = null;

    /** Optional. Sticker thumbnail in the .WEBP or .JPG format */
    public array|PhotoSize|null $thumb = null;

    /** Optional. Emoji associated with the sticker */
    public ?string $emoji = null;

    /** Optional. Name of the sticker set to which the sticker belongs */
    public ?string $setName = null;

    /** Optional. For mask stickers, the position where the mask should be placed */
    public array|MaskPosition|null $maskPosition = null;

    /** Optional. File size */
    public ?int $fileSize = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'thumb' => PhotoSize::class,
            'maskPosition' => MaskPosition::class
        ];
    }
}
