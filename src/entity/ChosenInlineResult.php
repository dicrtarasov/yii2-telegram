<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 16:59:43
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends TelegramEntity
{
    /** @var string The unique identifier for the result that was chosen */
    public $resultId;

    /** @var User The user that chose the result */
    public $from;

    /** @var ?Location Optional. Sender location, only for bots that require user location */
    public $location;

    /**
     * @var string Optional. Identifier of the sent inline message. Available only if there is an inline keyboard
     * attached to the message. Will be also received in callback queries and can be used to edit the message.
     */
    public $inlineMessageId;

    /**
     * @var string The query that was used to obtain the result
     */
    public $query;

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
