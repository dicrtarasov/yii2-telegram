<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:09:17
 */

declare(strict_types=1);
namespace dicr\telegram\request;

use dicr\json\EntityValidator;
use dicr\telegram\entity\BotCommand;
use dicr\telegram\TelegramRequest;

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
    public array $commands = [];

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            ['commands', 'required'],
            ['commands', EntityValidator::class]
        ];
    }

    /**
     * @inheritDoc
     */
    public function func(): string
    {
        return 'setMyCommands';
    }
}
