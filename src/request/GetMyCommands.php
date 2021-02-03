<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 03.02.21 21:10:19
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\BotCommand;
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
        return 'getMyCommands';
    }

    /**
     * @inheritDoc
     * @return BotCommand[]
     * @throws Exception
     */
    public function send(): array
    {
        return array_map(static fn($data): BotCommand => new BotCommand([
            'json' => $data
        ]), parent::send());
    }
}
