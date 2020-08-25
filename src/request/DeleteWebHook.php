<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:23:47
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * Use this method to remove webhook integration if you decide to switch back to getUpdates.
 * Returns True on success. Requires no parameters.
 *
 * @link https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebHook extends TelegramRequest
{
    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'deleteWebhook';
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
