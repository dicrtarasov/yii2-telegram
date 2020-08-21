<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.07.20 23:55:11
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

use function array_map;

/**
 * Сообщение.
 *
 * @link https://tlgrm.ru/docs/bots/api#message
 */
class Message extends TelegramEntity
{
    /** @var int Unique message identifier inside this chat */
    public $messageId;

    /**
     * @var ?User
     * Опционально. Отправитель. Может быть пустым в каналах.
     */
    public $from;

    /** @var int Date the message was sent in Unix time */
    public $date;

    /** @var Chat Conversation the message belongs to */
    public $chat;

    /**
     * @var ?User
     * Опционально. Для пересланных сообщений: отправитель оригинального сообщения.
     */
    public $forwardFrom;

    /**
     * @var ?int
     * Опционально. Для пересланных сообщений: дата отправки оригинального сообщения.
     */
    public $forwardDate;

    /**
     * @var ?Message
     * Опционально. Для ответов: оригинальное сообщение.
     * Note that the Message object in this field will not contain further reply_to_message
     * fields even if it itself is a reply.
     */
    public $replyToMessage;

    /**
     * @var ?string
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters
     */
    public $text;

    /**
     * @var ?MessageEntity[]
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public $entities;

    /**
     * @var ?Audio
     * Опционально. Информация об аудиофайле.
     */
    public $audio;

    /**
     * @var ?Document
     * Опционально. Информация о файле.
     */
    public $document;

    /**
     * @var ?PhotoSize[]
     * Опционально. Доступные размеры фото.
     */
    public $photo;

    /**
     * @var ?Sticker
     * Опционально. Информация о стикере.
     */
    public $sticker;

    /**
     * @var ?Video
     * Опционально. Информация о видеозаписи.
     */
    public $video;

    /**
     * @var ?Voice
     * Опционально. Информация о голосовом сообщении.
     */
    public $voice;

    /**
     * @var ?string
     * Опционально. Подпись к файлу, фото или видео, 0-200 символов.
     */
    public $caption;

    /**
     * @var ?Contact
     * Опционально. Информация об отправленном контакте.
     */
    public $contact;

    /**
     * @var ?Location
     * Опционально. Информация о местоположении.
     */
    public $location;

    /**
     * @var ?Venue
     * Опционально. Информация о месте на карте
     */
    public $venue;

    /**
     * @var ?User
     * Опционально. Информация о пользователе, добавленном в группу
     */
    public $newChatMember;

    /**
     * @var ?User
     * Опционально. Информация о пользователе, удалённом из группы
     */
    public $leftChatMember;

    /**
     * @var ?string
     * Опционально. Название группы было изменено на это поле
     */
    public $newChatTitle;

    /**
     * @var ?PhotoSize[]
     * Опционально. Фото группы было изменено на это поле.
     */
    public $newChatPhoto;

    /**
     * @var ?true
     * Опционально. Сервисное сообщение: фото группы было удалено
     */
    public $deleteChatPhoto;

    /**
     * @var ?true
     * Опционально. Сервисное сообщение: группа создана
     */
    public $groupChatCreated;

    /**
     * @var ?true
     * Опционально. Сервисное сообщение: супергруппа создана.
     */
    public $supergroupChatCreated;

    /**
     * @var ?true
     * Опционально. Сервисное сообщение: канал создан
     */
    public $channelChatCreated;

    /**
     * @var ?int
     * Опционально. Группа была преобразована в супергруппу с указанным идентификатором. Не превышает 1e13.
     */
    public $migrateToChatId;

    /**
     * @var ?int
     * Опционально. Cупергруппа была создана из группы с указанным идентификатором. Не превышает 1e13.
     */
    public $migrateFromChatId;

    /**
     * @var ?Message
     * Опционально. Указанное сообщение было прикреплено.
     * Note that the Message object in this field will not contain further reply_to_message fields even
     * if it is itself a reply.
     */
    public $pinnedMessage;

    /**
     * @inheritDoc
     */
    public function setData(array $data)
    {
        $this->messageId = (int)$data['message_id'];

        if (! empty($data['from'])) {
            $this->from = new User($data['from']);
        }

        $this->date = (int)$data['date'];
        $this->chat = new Chat($data['chat']);

        if (! empty($data['forward_from'])) {
            $this->forwardFrom = new User($data['forward_from']);
        }

        if (! empty($data['forward_date'])) {
            $this->forwardDate = (int)$data['forward_date'];
        }

        if (! empty($data['reply_to_message'])) {
            $this->replyToMessage = new self($data['reply_to_message']);
        }

        if (! empty($data['text'])) {
            $this->text = (string)$data['text'];
        }

        if (! empty($data['entities'])) {
            $this->entities = array_map(static function (array $data) {
                return new MessageEntity($data);
            }, $data['entities']);
        }

        if (! empty($data['audio'])) {
            $this->audio = new Audio($data['audio']);
        }

        if (! empty($data['document'])) {
            $this->document = new Document($data['document']);
        }

        if (! empty($data['photo'])) {
            $this->photo = array_map(static function (array $data) {
                return new PhotoSize($data);
            }, $data['photo']);
        }

        if (! empty($data['sticker'])) {
            $this->sticker = new Sticker($data['sticker']);
        }

        if (! empty($data['video'])) {
            $this->video = new Video($data['video']);
        }

        if (! empty($data['voice'])) {
            $this->voice = new Voice($data['voice']);
        }

        if (isset($data['caption'])) {
            $this->caption = (string)$data['caption'];
        }

        if (! empty($data['contact'])) {
            $this->contact = new Contact($data['contact']);
        }

        if (! empty($data['location'])) {
            $this->location = new Location($data['location']);
        }

        if (! empty($data['venue'])) {
            $this->venue = new Venue($data['venue']);
        }

        if (! empty($data['new_chat_member'])) {
            $this->newChatMember = new User($data['new_chat_member']);
        }

        if (! empty($data['left_chat_member'])) {
            $this->leftChatMember = new User($data['left_chat_member']);
        }

        if (isset($data['new_chat_title'])) {
            $this->newChatTitle = (string)$data['new_chat_title'];
        }

        if (! empty($data['new_chat_photo'])) {
            $this->newChatPhoto = array_map(static function (array $data) {
                return new PhotoSize($data);
            }, $data['new_chat_photo']);
        }

        if (isset($data['delete_chat_photo'])) {
            $this->deleteChatPhoto = (bool)$data['delete_chat_photo'];
        }

        if (isset($data['group_chat_created'])) {
            $this->groupChatCreated = (bool)$data['group_chat_created'];
        }

        if (isset($data['supergroup_chat_created'])) {
            $this->supergroupChatCreated = (bool)$data['supergroup_chat_created'];
        }

        if (isset($data['channel_chat_created'])) {
            $this->channelChatCreated = (bool)$data['channel_chat_created'];
        }

        if (isset($data['migrate_to_chat_id'])) {
            $this->migrateToChatId = (int)$data['migrate_to_chat_id'];
        }

        if (isset($data['migrate_from_chat_id'])) {
            $this->migrateFromChatId = (int)$data['migrate_from_chat_id'];
        }

        if (! empty($data['pinned_message'])) {
            $this->pinnedMessage = new self($data['pinned_message']);
        }
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return [
            'message_id' => (int)$this->messageId,
            'from' => $this->from ? $this->from->data : null,
            'date' => (int)$this->date,
            'chat' => $this->chat->data,
            'forward_from' => $this->forwardFrom ? $this->forwardFrom->data : null,
            'forward_date' => $this->forwardDate ? (int)$this->forwardDate : null,
            'reply_to_message' => $this->replyToMessage ? $this->replyToMessage->data : null,
            'text' => isset($this->text) ? (string)$this->text : null,
            'entities' => ! empty($this->entities) ? array_map(static function (MessageEntity $entity) {
                return $entity->data;
            }, $this->entities) : null,
            'audio' => $this->audio ? $this->audio->data : null,
            'document' => $this->document ? $this->document->data : null,
            'photo' => ! empty($this->photo) ? array_map(static function (PhotoSize $photo) {
                return $photo->data;
            }, $this->photo) : null,
            'sticker' => $this->sticker ? $this->sticker->data : null,
            'video' => $this->video ? $this->video->data : null,
            'voice' => $this->voice ? $this->voice->data : null,
            'caption' => isset($this->caption) ? (string)$this->caption : null,
            'contact' => $this->contact ? $this->contact->data : null,
            'location' => $this->location ? $this->location->data : null,
            'venue' => $this->venue ? $this->venue->data : null,
            'new_chat_member' => $this->newChatMember ? $this->newChatMember->data : null,
            'left_chat_member' => $this->leftChatMember ? $this->leftChatMember->data : null,
            'new_chat_title' => isset($this->newChatTitle) ? (string)$this->newChatTitle : null,
            'new_chat_photo' => ! empty($this->newChatPhoto) ? array_map(static function (PhotoSize $photo) {
                return $photo->data;
            }, $this->newChatPhoto) : null,
            'delete_chat_photo' => isset($this->deleteChatPhoto) ? (bool)$this->deleteChatPhoto : null,
            'group_chat_created' => isset($this->groupChatCreated) ? (bool)$this->groupChatCreated : null,
            'supergroup_chat_created' => isset($this->supergroupChatCreated) ? (bool)$this->supergroupChatCreated :
                null,
            'channel_chat_created' => isset($this->channelChatCreated) ? (bool)$this->channelChatCreated : null,
            'migrate_to_chat_id' => isset($this->migrateToChatId) ? (int)$this->migrateToChatId : null,
            'migrate_from_chat_id' => isset($this->migrateFromChatId) ? (int)$this->migrateFromChatId : null,
            'pinned_message' => ! empty($this->pinnedMessage) ? $this->pinnedMessage->data : null
        ];
    }
}
