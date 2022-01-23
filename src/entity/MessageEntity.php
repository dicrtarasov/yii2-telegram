<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:54:24
 */

declare(strict_types=1);

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
    /** @username */
    public const TYPE_MENTION = 'mention';

    /** #hashtag */
    public const TYPE_HASHTAG = 'hashtag';

    /** $USD */
    public const TYPE_CASHTAG = 'cashtag';

    /** /start @jobs_bot */
    public const TYPE_BOT_COMMAND = 'bot_command';

    /** https://telegram.org */
    public const TYPE_URL = 'url';

    /** do-not-reply@telegram.org */
    public const TYPE_EMAIL = 'email';

    /** +1-212-555-0123 */
    public const TYPE_PHONE_NUMBER = 'phone_number';

    /** bold text */
    public const TYPE_BOLD = 'bold';

    /** italic text */
    public const TYPE_ITALIC = 'italic';

    /** underlined text */
    public const TYPE_UNDERLINE = 'underline';

    /** strikethrough text */
    public const TYPE_STRIKETHROUGH = 'strikethrough';

    /** monowidth string */
    public const TYPE_CODE = 'code';

    /** monowidth block */
    public const TYPE_PRE = 'pre';

    /** for clickable text URLs */
    public const TYPE_TEXT_LINK = 'text_link';

    /** for users without usernames */
    public const TYPE_TEXT_MENTION = 'text_mention';

    /** Type of the entity. */
    public ?string $type = null;

    /** Offset in UTF-16 code units to the start of the entity */
    public ?int $offset = null;

    /** Length of the entity in UTF-16 code units */
    public ?int $length = null;

    /** Optional. For “text_link” only, url that will be opened after user taps on the text */
    public ?string $url = null;

    /** Optional. For “text_mention” only, the mentioned user */
    public array|User|null $user = null;

    /** Optional. For “pre” only, the programming language of the entity text */
    public ?string $language = null;

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
