<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:35:00
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\BotCommand;
use dicr\telegram\TelegramRequest;
use dicr\validate\ValidateException;
use yii\base\Exception;

use function is_array;

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
    public function rules()
    {
        return [
            ['commands', 'required'],
            ['commands', function (string $attribute) {
                if (is_array($this->commands)) {
                    foreach ($this->commands as $command) {
                        if (! $command->validate()) {
                            $this->addError($attribute, (new ValidateException($command))->getMessage());
                            break;
                        }
                    }
                } else {
                    $this->addError($attribute, 'Список команд должен быть массивом BotCommand');
                }
            }]
        ];
    }

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
