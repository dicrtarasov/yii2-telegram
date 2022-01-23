<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 04:18:08
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Contains information about the current status of a webhook.
 *
 * @link https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends TelegramEntity
{
    /** Webhook URL, may be empty if webhook is not set up. */
    public ?string $url = null;

    /** True, if a custom certificate was provided for webhook certificate checks */
    public ?bool $hasCustomCertificate = null;

    /** Number of updates awaiting delivery */
    public ?int $pendingUpdateCount = null;

    /**
     * Optional. Unix time for the most recent error that happened when trying to
     * deliver an update via webhook.
     */
    public ?int $lastErrorDate = null;

    /**
     * Optional. Error message in human-readable format for the most recent error that
     * happened when trying to deliver an update via webhook.
     */
    public ?string $lastErrorMessage = null;

    /** Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery */
    public ?int $maxConnections = null;

    /**
     * @var string[]|null
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types.
     */
    public ?array $allowedUpdates = null;
}
