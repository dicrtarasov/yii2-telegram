<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.03.20 02:29:34
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Class ChatPhoto.
 * This object represents a chat photo.
 *
 * @link Last name of the other party in a private chat
 */
class ChatPhoto extends TelegramEntity
{
    /**
     * @var string
     * File identifier of small (160x160) chat photo.
     * This file_id can be used only for photo download and only for as long as the photo is not changed.
     */
    public $smallFileId;

    /**
     * @var string
     * Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $smallFileUniqueId;

    /**
     * @var string
     * File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only
     * for as long as the photo is not changed.
     */
    public $bigFileId;

    /**
     * @var string
     * Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public $bigFileUniqueId;

    /**
     * @inheritDoc
     */
    public function setData(array $data)
    {
        $this->smallFileId = (string)$data['small_file_id'];
        $this->smallFileUniqueId = (string)$data['small_file_unique_id'];
        $this->bigFileId = (string)$data['big_file_id'];
        $this->bigFileUniqueId = (string)$data['big_file_unique_id'];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return [
            'small_file_id' => (string)$this->smallFileId,
            'small_file_unique_id' => (string)$this->smallFileUniqueId,
            'big_file_id' => (string)$this->smallFileId,
            'big_file_unique_id' => (string)$this->bigFileUniqueId
        ];
    }
}
