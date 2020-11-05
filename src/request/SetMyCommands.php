<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:56:37
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\json\EntityValidator;
use dicr\telegram\entity\BotCommand;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

/**
 * Use this method to change the list of the bot's commands. Returns True on success.
 *
 * @link https://core.telegram.org/bots/api#setmycommands
 */
class SetMyCommands extends TelegramRequest
{
    /**
     * @var BotCommand[]
     * A JSON-serialized list of bot commands to be set as the list of the bot's commands.
     * At most 100 commands can be specified.
     */
    public $commands;

    /**
     * @inheritDoc
     */
    public function rules() : array
    {
        return [
            ['commands', 'required'],
            ['commands', EntityValidator::class]
        ];
    }

    /**
     * @inheritDoc
     */
    public function func() : string
    {
        return 'setMyCommands';
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function send() : void
    {
        parent::send();
    }
}
