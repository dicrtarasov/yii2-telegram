<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:24:56
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends TelegramEntity
{
    /** The unique identifier for the result that was chosen */
    public ?string $resultId = null;

    /** The user that chose the result */
    public array|User|null $from = null;

    /** Optional. Sender location, only for bots that require user location */
    public array|Location|null $location = null;

    /**
     * Optional. Identifier of the sent inline message. Available only if there is an inline keyboard
     * attached to the message. Will be also received in callback queries and can be used to edit the message.
     */
    public ?string $inlineMessageId = null;

    /** The query that was used to obtain the result */
    public ?string $query = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class
        ];
    }
}
