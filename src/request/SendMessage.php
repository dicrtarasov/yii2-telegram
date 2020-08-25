<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:23:47
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\ForceReply;
use dicr\telegram\entity\InlineKeyboardMarkup;
use dicr\telegram\entity\Message;
use dicr\telegram\entity\ReplyKeyboardMarkup;
use dicr\telegram\entity\ReplyKeyboardRemove;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

use function get_class;
use function gettype;
use function is_numeric;
use function is_object;

/**
 * Запрос на отправку сообщения в чате.
 *
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class SendMessage extends TelegramRequest
{
    /**
     * @var string формат сообщения markdown
     * @link https://core.telegram.org/bots/api#markdown-style
     */
    public const PARSE_MODE_MARKDOWN = 'Markdown';

    /**
     * @var string формат текст Markdown V2
     * @link https://core.telegram.org/bots/api#markdownv2-style
     */
    public const PARSE_MODE_MARKDOWN_V2 = 'MarkdownV2';

    /**
     * @var string формат текста HTML
     * @link https://core.telegram.org/bots/api#html-style
     */
    public const PARSE_MODE_HTML = 'HTML';

    /** @var string|int
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     *
     * Для публичных это @chat_name, для приватных это числовой ID,
     * Получить ID приватного чата можно если временно сделать его публичным, отправить в него сообщение и в ответе
     * посмотреть его id, затем сделать обратно приватным.
     */
    public $chatId;

    /** @var string Text of the message to be sent, 1-4096 characters after entities parsing */
    public $text;

    /**
     * @var ?string Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     */
    public $parseMode;

    /** @var ?bool Disables link previews for links in this message */
    public $disableWebPagePreview;

    /** @var ?bool Sends the message silently. Users will receive a notification with no sound. */
    public $disableNotification;

    /** @var ?int If the message is a reply, ID of the original message */
    public $replyToMessageId;

    /**
     * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply
     * keyboard or to force a reply from the user.
     */
    public $replyMarkup;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['chatId', 'trim'],
            ['chatId', 'required'],
            ['chatId', function ($attribute) {
                if (! preg_match('~^(@[\w\_]+)|(\-?\d+)$~u', $this->{$attribute})) {
                    $this->addError($attribute, 'Некорректный идентификатор чата');
                }

                if (is_numeric($this->chatId)) {
                    $this->chatId = (int)$this->chatId;
                }
            }],

            ['text', 'trim'],
            ['text', 'required'],
            ['text', 'string', 'max' => 4096],

            ['parseMode', 'default'],
            ['parseMode', 'in', 'range' => [
                self::PARSE_MODE_HTML, self::PARSE_MODE_MARKDOWN, self::PARSE_MODE_MARKDOWN_V2]
            ],

            [['disableWebPagePreview', 'disableNotification'], 'default'],
            [['disableWebPagePreview', 'disableNotification'], 'boolean'],
            [['disableWebPagePreview', 'disableNotification'], 'filter', 'filter' => 'boolval', 'skipOnEmpty' => true],

            ['replyToMessageId', 'default'],
            ['replyToMessageId', 'integer'],
            ['replyToMessageId', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['replyMarkup', 'default'],
            ['replyMarkup', function (string $attribute) {
                $markup = $this->replyMarkup;
                if (! is_object($markup)) {
                    $this->addError($attribute, 'Некорректный тип replyMarkup: ' . gettype($markup));
                } elseif ((! $markup instanceof InlineKeyboardMarkup) &&
                    (! $markup instanceof ReplyKeyboardMarkup) &&
                    (! $markup instanceof ReplyKeyboardRemove) &&
                    (! $markup instanceof ForceReply)
                ) {
                    $this->addError($attribute, 'Некорректный тип replyMarkup: ' . get_class($markup));
                }
            }]

        ];
    }

    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'sendMessage';
    }

    /**
     * @inheritDoc
     * @return Message
     * @throws Exception
     */
    public function send(): Message
    {
        return new Message([
            'json' => parent::send()
        ]);
    }
}
