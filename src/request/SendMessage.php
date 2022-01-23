<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:08:36
 */

declare(strict_types=1);
namespace dicr\telegram\request;

use dicr\telegram\entity\ForceReply;
use dicr\telegram\entity\InlineKeyboardMarkup;
use dicr\telegram\entity\Message;
use dicr\telegram\entity\ReplyKeyboardMarkup;
use dicr\telegram\entity\ReplyKeyboardRemove;
use dicr\telegram\TelegramRequest;
use Yii;
use yii\base\Exception;

use function is_array;
use function is_numeric;

/**
 * Запрос на отправку сообщения в чате.
 *
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class SendMessage extends TelegramRequest
{
    /**
     * формат сообщения markdown
     *
     * @link https://core.telegram.org/bots/api#markdown-style
     */
    public const PARSE_MODE_MARKDOWN = 'Markdown';

    /**
     * формат текст Markdown V2
     *
     * @link https://core.telegram.org/bots/api#markdownv2-style
     */
    public const PARSE_MODE_MARKDOWN_V2 = 'MarkdownV2';

    /**
     * формат текста HTML
     *
     * @link https://core.telegram.org/bots/api#html-style
     */
    public const PARSE_MODE_HTML = 'HTML';

    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     *
     * Для публичных это @chat_name, для приватных это числовой ID,
     * Получить ID приватного чата можно если временно сделать его публичным, отправить в него сообщение и в ответе
     * посмотреть его id, затем сделать обратно приватным.
     */
    public string|int|null $chatId = null;

    /** Text of the message to be sent, 1-4096 characters after entities parsing */
    public ?string $text = null;

    /**
     * Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     */
    public ?string $parseMode = null;

    /** Disables link previews for links in this message */
    public ?bool $disableWebPagePreview = null;

    /** Sends the message silently. Users will receive a notification with no sound. */
    public ?bool $disableNotification = null;

    /** If the message is a reply, ID of the original message */
    public ?int $replyToMessageId = null;

    /**
     * Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply
     * keyboard or to force a reply from the user.
     */
    public array|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            ['chatId', 'trim'],
            ['chatId', 'required'],
            ['chatId', function ($attribute) {
                if (!preg_match('~^(@[\w\_]+)|(\-?\d+)$~u', $this->{$attribute})) {
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
            ['replyMarkup', function () {
                if (is_array($this->replyMarkup)) {
                    /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
                    $this->replyMarkup = Yii::createObject($this->replyMarkup);
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
     * @return Message отправленное сообщение
     * @throws Exception
     */
    public function send(): Message
    {
        return new Message([
            'json' => parent::send()
        ]);
    }
}
