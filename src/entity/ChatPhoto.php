<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:56:59
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents a chat photo.
 *
 * @link https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends TelegramEntity
{
    /**
     * @var string File identifier of small (160x160) chat photo.
     * This file_id can be used only for photo download and only for as long as the photo is not changed.
     */
    public $smallFileId;

    /**
     * @var string Unique file identifier of small (160x160) chat photo, which is supposed to be the same over
     * time and for different bots. Can't be used to download or reuse the file.
     */
    public $smallFileUniqueId;

    /**
     * @var string File identifier of big (640x640) chat photo. This file_id can be used only for photo
     * download and only for as long as the photo is not changed.
     */
    public $bigFileId;

    /**
     * @var string Unique file identifier of big (640x640) chat photo, which is supposed to be the same
     * over time and for different bots. Can't be used to download or reuse the file.
     */
    public $bigFileUniqueId;
}
