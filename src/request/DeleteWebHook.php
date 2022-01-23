<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:02:53
 */

declare(strict_types=1);
namespace dicr\telegram\request;

use dicr\telegram\TelegramRequest;

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
}
