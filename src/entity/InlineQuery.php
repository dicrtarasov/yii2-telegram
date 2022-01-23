<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:36:07
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return
 * some default or trending results.
 *
 * @link https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends TelegramEntity
{
    /** Unique identifier for this query */
    public ?string $id = null;

    /** Sender */
    public array|User|null $from = null;

    /** Optional. Sender location, only for bots that request user location */
    public array|Location|null $location = null;

    /** Text of the query (up to 256 characters) */
    public ?string $query = null;

    /** Offset of the results to be returned, can be controlled by the bot */
    public ?string $offset = null;

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
