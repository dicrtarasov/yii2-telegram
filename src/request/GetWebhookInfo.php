<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:05:10
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\WebhookInfo;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * Contains information about the current status of a webhook.
 *
 * @link https://core.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfo extends TelegramRequest
{
    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'getWebhookInfo';
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function send(): WebhookInfo
    {
        return new WebhookInfo([
            'json' => parent::send()
        ]);
    }
}
