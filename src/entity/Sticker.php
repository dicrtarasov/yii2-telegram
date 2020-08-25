<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:30:03
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
    /** @var string Identifier for this file, which can be used to download or reuse the file */
    public $fileId;

    /**
     * @var string Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $fileUniqueId;

    /** @var int Sticker width */
    public $width;

    /** @var int Sticker height */
    public $height;

    /** @var True, if the sticker is animated */
    public $isAnimated;

    /** @var ?PhotoSize Optional. Sticker thumbnail in the .WEBP or .JPG format */
    public $thumb;

    /** @var ?string Optional. Emoji associated with the sticker */
    public $emoji;

    /** @var ?string Optional. Name of the sticker set to which the sticker belongs */
    public $setName;

    /** @var ?MaskPosition Optional. For mask stickers, the position where the mask should be placed */
    public $maskPosition;

    /** @var ?int Optional. File size */
    public $fileSize;

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
