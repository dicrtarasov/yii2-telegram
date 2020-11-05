<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 05:19:28
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\json\EntityValidator;
use dicr\telegram\entity\InputFile;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * Use this method to specify a url and receive incoming updates via an outgoing webhook.
 * Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url,
 * containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a
 * reasonable amount of attempts. Returns True on success.
 *
 * @link https://core.telegram.org/bots/api#setwebhook
 */
class SetWebhook extends TelegramRequest
{
    /**
     * @var string
     * HTTPS url to send updates to. Use an empty string to remove webhook integration
     */
    public $url;

    /**
     * @var ?InputFile
     */
    public $certificate;

    /**
     * @var ?int
     * Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100.
     * Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase
     * your bot's throughput.
     */
    public $maxConnections;

    /**
     * @var ?string[]
     * A JSON-serialized list of the update types you want your bot to receive.
     * For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates
     * of these types. See Update for a complete list of available update types. Specify an empty list to
     * receive all updates regardless of type (default). If not specified, the previous setting will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the setWebhook,
     * so unwanted updates may be received for a short period of time.
     */
    public $allowedUpdates;

    /**
     * @inheritDoc
     */
    public function rules() : array
    {
        return [
            ['url', 'trim'],
            ['url', 'url', 'skipOnEmpty' => true],

            ['certificate', 'default'],
            ['certificate', EntityValidator::class],

            ['maxConnections', 'default'],
            ['maxConnections', 'integer', 'min' => 1, 'max' => 100],
            ['maxConnections', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['allowedUpdates', 'default'],
            ['allowedUpdates', 'each', 'rule' => ['string']],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'certificate' => InputFile::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'setWebhook';
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function send(): void
    {
        parent::send();
    }
}
