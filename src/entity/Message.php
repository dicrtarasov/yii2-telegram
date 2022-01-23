<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:51:45
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Сообщение.
 *
 * @link https://tlgrm.ru/docs/bots/api#message
 */
class Message extends TelegramEntity
{
    /** Unique message identifier inside this chat */
    public ?int $messageId = null;

    /** Опционально. Отправитель. Может быть пустым в каналах. */
    public array|User|null $from = null;

    /** Date the message was sent in Unix time */
    public ?int $date = null;

    /** Conversation the message belongs to */
    public array|Chat|null $chat = null;

    /** Опционально. Для пересланных сообщений: отправитель оригинального сообщения. */
    public array|User|null $forwardFrom = null;

    /** Optional. For messages forwarded from channels, information about the original channel */
    public array|Chat|null $forwardFromChat = null;

    /** Optional. For messages forwarded from channels, identifier of the original message in the channel */
    public ?int $forwardFromMessageId = null;

    /** Optional. For messages forwarded from channels, signature of the post author if present */
    public ?string $forwardSignature = null;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link to their
     * account in forwarded messages
     */
    public ?string $forwardSenderName = null;

    /** Опционально. Для пересланных сообщений: дата отправки оригинального сообщения. */
    public ?int $forwardDate = null;

    /**
     * Опционально. Для ответов: оригинальное сообщение.
     * Note that the Message object in this field will not contain further reply_to_message
     * fields even if it itself is a reply.
     */
    public array|Message|null $replyToMessage = null;

    /** Optional. Bot through which the message was sent */
    public array|User|null $viaBot = null;

    /** Optional. Date the message was last edited in Unix time */
    public ?int $editDate = null;

    /** Optional. The unique identifier of a media message group this message belongs to */
    public ?string $mediaGroupId = null;

    /** Optional. Signature of the post author for messages in channels */
    public ?string $authorSignature = null;

    /** Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters */
    public ?string $text = null;

    /**
     * @var MessageEntity[]|null
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public ?array $entities = null;

    /**
     * Optional. Message is an animation, information about the animation. For backward compatibility,
     * when this field is set, the document field will also be set
     */
    public array|Animation|null $animation = null;

    /** Optional. Message is an audio file, information about the file */
    public array|Audio|null $audio = null;

    /** Optional. Message is a general file, information about the file */
    public array|Document|null $document = null;

    /** @var PhotoSize[]|null Optional. Message is a photo, available sizes of the photo */
    public ?array $photo = null;

    /** Optional. Message is a sticker, information about the sticker */
    public array|Sticker|null $sticker = null;

    /** Optional. Message is a video, information about the video */
    public array|Video|null $video = null;

    /** Optional. Message is a video note, information about the video message */
    public array|VideoNote|null $videoNote = null;

    /** Optional. Message is a voice message, information about the file */
    public array|Voice|null $voice = null;

    /** Optional. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters */
    public ?string $caption = null;

    /**
     * @var MessageEntity[]|null Optional. For messages with a caption, special entities like usernames, URLs,
     * bot commands, etc. that appear in the caption
     */
    public ?array $captionEntities = null;

    /** Опционально. Информация об отправленном контакте. */
    public array|Contact|null $contact = null;

    /** Optional. Message is a dice with random value from 1 to 6 */
    public array|Dice|null $dice = null;

    /** Optional. Message is a game, information about the game. */
    public array|Game|null $game = null;

    /** Optional. Message is a native poll, information about the poll */
    public array|Poll|null $poll = null;

    /**
     * Optional. Message is a venue, information about the venue. For backward compatibility,
     * when this field is set, the location field will also be set
     */
    public array|Venue|null $venue = null;

    /** Optional. Message is a shared location, information about the location */
    public array|Location|null $location = null;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     */
    public array|User|null $newChatMember = null;

    /**
     * Optional. A member was removed from the group, information about them
     * (this member may be the bot itself)
     */
    public array|User|null $leftChatMember = null;

    /** Optional. A chat title was changed to this value */
    public ?string $newChatTitle = null;

    /** @var PhotoSize[]|null Optional. A chat photo was change to this value */
    public ?array $newChatPhoto = null;

    /** Optional. Service message: the chat photo was deleted */
    public ?bool $deleteChatPhoto = null;

    /** Optional. Service message: the group has been created */
    public ?bool $groupChatCreated = null;

    /**
     * Optional. Service message: the supergroup has been created.
     * This field can't be received in a message coming through updates, because
     * bot can't be a member of a supergroup when it is created. It can only be
     * found in reply_to_message if someone replies to a very first message in a
     * directly created supergroup.
     */
    public ?bool $supergroupChatCreated = null;

    /**
     * Optional. Service message: the channel has been created.
     * This field can't be received in a message coming through updates, because bot
     * can't be a member of a channel when it is created. It can only be found in
     * reply_to_message if someone replies to a very first message in a channel.
     */
    public ?bool $channelChatCreated = null;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit
     * integer or double-precision float type are safe for storing this identifier.
     */
    public ?int $migrateToChatId = null;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     */
    public ?int $migrateFromChatId = null;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will
     * not contain further reply_to_message fields even if it is itself a reply.
     */
    public array|Message|null $pinnedMessage = null;

    /** Optional. Message is an invoice for a payment, information about the invoice. */
    public array|Invoice|null $invoice = null;

    /**
     * Optional. Message is a service message about a successful payment,
     * information about the payment.
     */
    public array|SuccessfulPayment|null $successfulPayment = null;

    /** Optional. The domain name of the website on which the user has logged in. */
    public ?string $connectedWebsite = null;

    /** Optional. Telegram Passport data */
    public array|PassportData|null $passportData = null;

    /**
     * Optional. Inline keyboard attached to the message.
     * login_url buttons are represented as ordinary url buttons.
     */
    public array|InlineKeyboardMarkup|null $replyMarkup = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'from' => User::class,
            'chat' => Chat::class,
            'forwardFrom' => User::class,
            'forwardFromChat' => Chat::class,
            'replyToMessage' => self::class,
            'viaBot' => User::class,
            'entities' => [MessageEntity::class],
            'animation' => Animation::class,
            'audio' => Audio::class,
            'document' => Document::class,
            'photo' => [PhotoSize::class],
            'sticker' => Sticker::class,
            'video' => Video::class,
            'videoNote' => VideoNote::class,
            'voice' => Voice::class,
            'captionEntities' => [MessageEntity::class],
            'contact' => Contact::class,
            'dice' => Dice::class,
            'game' => Game::class,
            'poll' => Poll::class,
            'venue' => Venue::class,
            'location' => Location::class,
            'newChatMembers' => [User::class],
            'leftChatMember' => User::class,
            'newChatPhoto' => [PhotoSize::class],
            'pinnedMessage' => self::class,
            'invoice' => Invoice::class,
            'successfulPayment' => SuccessfulPayment::class,
            'passportData' => PassportData::class,
            'replyMarkup' => InlineKeyboardMarkup::class
        ];
    }
}
