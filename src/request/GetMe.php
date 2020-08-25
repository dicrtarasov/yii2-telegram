<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:23:47
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
     * @return User
     * @throws Exception
     */
    public function send(): User
    {
        return new User([
            'json' => parent::send()
        ]);
    }
}
