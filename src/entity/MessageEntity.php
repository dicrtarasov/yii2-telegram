<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 02:22:11
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Class MessageEntity.
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @link https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends TelegramEntity
{
    /** @var string @username */
    public const TYPE_MENTION = 'mention';

    /** @var string #hashtag */
    public const TYPE_HASHTAG = 'hashtag';

    /** @var string $USD */
    public const TYPE_CASHTAG = 'cashtag';

    /**  @var string /start @jobs_bot */
    public const TYPE_BOT_COMMAND = 'bot_command';

    /** @var string https://telegram.org */
    public const TYPE_URL = 'url';

    /** @var string do-not-reply@telegram.org */
    public const TYPE_EMAIL = 'email';

    /** @var string +1-212-555-0123 */
    public const TYPE_PHONE_NUMBER = 'phone_number';

    /** @var string bold text */
    public const TYPE_BOLD = 'bold';

    /** @var string italic text */
    public const TYPE_ITALIC = 'italic';

    /** @var string underlined text */
    public const TYPE_UNDERLINE = 'underline';

    /** @var string strikethrough text */
    public const TYPE_STRIKETHROUGH = 'strikethrough';

    /** @var string monowidth string */
    public const TYPE_CODE = 'code';

    /** @var string monowidth block */
    public const TYPE_PRE = 'pre';

    /** @var string for clickable text URLs */
    public const TYPE_TEXT_LINK = 'text_link';

    /** @var string for users without usernames */
    public const TYPE_TEXT_MENTION = 'text_mention';

    /** @var string Type of the entity. */
    public $type;

    /** @var int Offset in UTF-16 code units to the start of the entity */
    public $offset;

    /** @var int Length of the entity in UTF-16 code units */
    public $length;

    /** @var ?string Optional. For “text_link” only, url that will be opened after user taps on the text */
    public $url;

    /** @var ?User Optional. For “text_mention” only, the mentioned user */
    public $user;

    /** @var ?string Optional. For “pre” only, the programming language of the entity text */
    public $language;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'user' => User::class
        ];
    }
}
