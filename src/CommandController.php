<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 22.08.20 00:10:37
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\validate\ValidateException;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\httpclient\Exception;

/**
 * Консольный контроллер.
 *
 * @property-read TelegramModule $module
 */
class CommandController extends Controller
{
    /**
     * Установка webhook.
     *
     * @throws ValidateException
     * @throws \yii\base\Exception
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function actionWebhook()
    {
        $this->module->installWebHook();
    }
}
