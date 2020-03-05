<?php
/**
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 06.03.20 02:28:32
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

/**
 * Сообщение.
 *
 * @link https://core.telegram.org/bots/api#message
 * @package app\modules\sitemon\components
 * @todo implement full model
 */
class Message extends BaseEntity
{
    /** @var int Unique message identifier inside this chat */
    public $messageId;

    /** @var int Date the message was sent in Unix time */
    public $date;

    /** @var \dicr\telegram\entity\Chat Conversation the message belongs to */
    public $chat;

    /**
     * @var string|null
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters
     */
    public $text;

    /**
     * @var MessageEntity[]|null
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public $entities;

    /**
     * @inheritDoc
     */
    public function configure(array $data)
    {
        $this->messageId = (int)$data['message_id'];
        $this->date = (int)$data['date'];
        $this->chat = new Chat($data['chat']);
        $this->text = isset($data['text']) ? (string)$data['text'] : null;

        $this->entities = isset($data['entities']) ? array_map(static function(array $entity) {
            return new MessageEntity($entity);
        }, $data['entities']) : null;
    }

    /**
     * @inheritDoc
     */
    public function toData()
    {
        return array_filter([
            'message_id' => (int)$this->messageId,
            'date' => (int)$this->date,
            'chat' => $this->chat->toData(),
            'text' => isset($this->text) ? (string)$this->text : null,
            'entities' => isset($this->entities) ? array_map(static function(MessageEntity $entity) {
                return $entity->toData();
            }, $this->entities) : null
        ], static function($val) {
            return $val !== null && $val !== '' && $val !== [];
        });
    }
}
