<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:38:05
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * Use this method to get the current list of the bot's commands. Requires no parameters.
 * Returns Array of BotCommand on success.
 *
 * @link https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommands extends TelegramRequest
{
    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'setMyCommands';
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
