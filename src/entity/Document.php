<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:22:37
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 */
class Document extends TelegramEntity
{
    /** @var string Identifier for this file, which can be used to download or reuse the file */
    public $fileId;

    /**
     * @var string Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $fileUniqueId;

    /** @var ?PhotoSize Optional. Document thumbnail as defined by sender */
    public $thumb;

    /** @var ?string Optional. Original filename as defined by sender */
    public $fileName;

    /** @var ?string Optional. MIME type of the file as defined by sender */
    public $mimeType;

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
