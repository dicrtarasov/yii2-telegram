<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:23:47
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
     * @return WebhookInfo
     * @throws Exception
     */
    public function send(): WebhookInfo
    {
        return new WebhookInfo([
            'json' => parent::send()
        ]);
    }
}
