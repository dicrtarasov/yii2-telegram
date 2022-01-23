<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:03:03
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\User;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * A simple method for testing your bot's auth token. Requires no parameters.
 * Returns basic information about the bot in form of a User object.
 *
 * @link https://core.telegram.org/bots/api#getme
 */
class GetMe extends TelegramRequest
{
    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'getMe';
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function send(): User
    {
        return new User([
            'json' => parent::send()
        ]);
    }
}
