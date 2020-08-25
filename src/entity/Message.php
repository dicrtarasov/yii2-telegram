<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 15:51:51
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

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
     * @var ?Chat Optional. For messages forwarded from channels, information about the original channel
     */
    public $forwardFromChat;

    /**
     * @var ?int Optional. For messages forwarded from channels, identifier of the original message in the channel
     */
    public $forwardFromMessageId;

    /**
     * @var ?string Optional. For messages forwarded from channels, signature of the post author if present
     */
    public $forwardSignature;

    /**
     * @var ?string Optional. Sender's name for messages forwarded from users who disallow adding a link to their
     * account in forwarded messages
     */
    public $forwardSenderName;

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
     * @var ?User Optional. Bot through which the message was sent
     */
    public $viaBot;

    /**
     * @var ?int Optional. Date the message was last edited in Unix time
     */
    public $editDate;

    /**
     * @var ?string Optional. The unique identifier of a media message group this message belongs to
     */
    public $mediaGroupId;

    /**
     * @var ?string Optional. Signature of the post author for messages in channels
     */
    public $authorSignature;

    /**
     * @var ?string Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters
     */
    public $text;

    /**
     * @var ?MessageEntity[]
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public $entities;

    /**
     * @var ?Animation Optional. Message is an animation, information about the animation. For backward compatibility,
     * when this field is set, the document field will also be set
     */
    public $animation;

    /**
     * @var ?Audio Optional. Message is an audio file, information about the file
     */
    public $audio;

    /**
     * @var ?Document Optional. Message is a general file, information about the file
     */
    public $document;

    /**
     * @var ?PhotoSize[] Optional. Message is a photo, available sizes of the photo
     */
    public $photo;

    /**
     * @var ?Sticker Optional. Message is a sticker, information about the sticker
     */
    public $sticker;

    /**
     * @var ?Video Optional. Message is a video, information about the video
     */
    public $video;

    /**
     * @var ?VideoNote Optional. Message is a video note, information about the video message
     */
    public $videoNote;

    /**
     * @var ?Voice Optional. Message is a voice message, information about the file
     */
    public $voice;

    /**
     * @var ?string Optional. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters
     */
    public $caption;

    /**
     * @var ?MessageEntity[] Optional. For messages with a caption, special entities like usernames, URLs,
     * bot commands, etc. that appear in the caption
     */
    public $captionEntities;

    /**
     * @var ?Contact
     * Опционально. Информация об отправленном контакте.
     */
    public $contact;

    /**
     * @var ?Dice Optional. Message is a dice with random value from 1 to 6
     */
    public $dice;

    /**
     * @var ?Game Optional. Message is a game, information about the game.
     */
    public $game;

    /** @var ?Poll Optional. Message is a native poll, information about the poll */
    public $poll;

    /**
     * @var ?Venue Optional. Message is a venue, information about the venue. For backward compatibility,
     * when this field is set, the location field will also be set
     */
    public $venue;

    /**
     * @var ?Location Optional. Message is a shared location, information about the location
     */
    public $location;

    /**
     * @var ?User Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     */
    public $newChatMember;

    /**
     * @var ?User Optional. A member was removed from the group, information about them
     * (this member may be the bot itself)
     */
    public $leftChatMember;

    /**
     * @var ?string Optional. A chat title was changed to this value
     */
    public $newChatTitle;

    /**
     * @var ?PhotoSize[] Optional. A chat photo was change to this value
     */
    public $newChatPhoto;

    /**
     * @var ?true Optional. Service message: the chat photo was deleted
     */
    public $deleteChatPhoto;

    /**
     * @var ?true Optional. Service message: the group has been created
     */
    public $groupChatCreated;

    /**
     * @var ?true Optional. Service message: the supergroup has been created.
     * This field can't be received in a message coming through updates, because
     * bot can't be a member of a supergroup when it is created. It can only be
     * found in reply_to_message if someone replies to a very first message in a
     * directly created supergroup.
     */
    public $supergroupChatCreated;

    /**
     * @var ?true Optional. Service message: the channel has been created.
     * This field can't be received in a message coming through updates, because bot
     * can't be a member of a channel when it is created. It can only be found in
     * reply_to_message if someone replies to a very first message in a channel.
     */
    public $channelChatCreated;

    /**
     * @var ?int Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit
     * integer or double-precision float type are safe for storing this identifier.
     */
    public $migrateToChatId;

    /**
     * @var ?int Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     */
    public $migrateFromChatId;

    /**
     * @var ?Message Optional. Specified message was pinned. Note that the Message object in this field will
     * not contain further reply_to_message fields even if it is itself a reply.
     */
    public $pinnedMessage;

    /**
     * @var ?Invoice Optional. Message is an invoice for a payment, information about the invoice.
     */
    public $invoice;

    /**
     * @var ?SuccessfulPayment Optional. Message is a service message about a successful payment,
     * information about the payment.
     */
    public $successfulPayment;

    /**
     * @var ?string Optional. The domain name of the website on which the user has logged in.
     */
    public $connectedWebsite;

    /**
     * @var ?PassportData Optional. Telegram Passport data
     */
    public $passportData;

    /**
     * @var ?InlineKeyboardMarkup Optional. Inline keyboard attached to the message.
     * login_url buttons are represented as ordinary url buttons.
     */
    public $replyMarkup;

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
