<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:28:16
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
    /** @var string Unique identifier for this query */
    public $id;

    /** @var User Sender */
    public $from;

    /** @var ?Location Optional. Sender location, only for bots that request user location */
    public $location;

    /** @var string Text of the query (up to 256 characters) */
    public $query;

    /** @var string Offset of the results to be returned, can be controlled by the bot */
    public $offset;

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
