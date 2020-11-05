<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:45:49
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

use function preg_match;

/**
 * This object represents a bot command.
 *
 * @link https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends TelegramEntity
{
    /**
     * @var string
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     */
    public $command;

    /**
     * @var string
     * Description of the command, 3-256 characters.
     */
    public $description;

    /**
     * @inheritDoc
     */
    public function rules() : array
    {
        return [
            ['command', 'trim'],
            ['command', 'required'],
            ['command', 'string', 'max' => 32],
            ['command', function (string $attribute) {
                if (! preg_match('~^[a-z0-9_]+$~', $this->command)) {
                    $this->addError($attribute,
                        'Команда может содержать только маленькие латинские буквы, цифры и подчеркивание'
                    );
                }
            }],

            ['description', 'trim'],
            ['description', 'required'],
            ['description', 'string', 'min' => 3, 'max' => 256]
        ];
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->command . ' - ' . $this->description;
    }
}
