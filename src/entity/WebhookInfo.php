<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 23:56:35
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
    /**
     * @var ?string
     * Webhook URL, may be empty if webhook is not set up.
     */
    public $url;

    /**
     * @var bool
     * True, if a custom certificate was provided for webhook certificate checks
     */
    public $hasCustomCertificate;

    /** @var int Number of updates awaiting delivery */
    public $pendingUpdateCount;

    /**
     * @var ?int
     * Optional. Unix time for the most recent error that happened when trying to
     * deliver an update via webhook.
     */
    public $lastErrorDate;

    /**
     * @var ?string
     * Optional. Error message in human-readable format for the most recent error that
     * happened when trying to deliver an update via webhook.
     */
    public $lastErrorMessage;

    /**
     * @var ?int
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     */
    public $maxConnections;

    /**
     * @var ?string[]
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types.
     */
    public $allowedUpdates;
}
