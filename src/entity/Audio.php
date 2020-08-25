<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 18:45:07
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
    /** @var string Identifier for this file, which can be used to download or reuse the file */
    public $fileId;

    /**
     * @var string Unique identifier for this file, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $fileUniqueId;

    /** @var int Duration of the audio in seconds as defined by sender */
    public $duration;

    /** @var ?string Optional. Performer of the audio as defined by sender or by audio tags */
    public $performer;

    /** @var ?string Optional. Title of the audio as defined by sender or by audio tags */
    public $title;

    /** @var ?string Optional. MIME type of the file as defined by sender */
    public $mimeType;

    /** @var ?int Optional. File size */
    public $fileSize;

    /** @var ?PhotoSize Optional. Thumbnail of the album cover to which the music file belongs */
    public $thumb;

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
