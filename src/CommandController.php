<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:47:05
 */

declare(strict_types = 1);
namespace dicr\telegram;

use dicr\telegram\request\DeleteWebHook;
use dicr\telegram\request\GetWebhookInfo;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\console\Controller;

use function date;
use function implode;
use function printf;

/**
 * Консольный контроллер.
 *
 * @property-read TelegramModule $module
 */
class CommandController extends Controller
{
    /**
     * Получить состояние webhook.
     *
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function actionWebhookInfo() : void
    {
        /** @var GetWebhookInfo $request */
        $request = $this->module->createRequest([
            'class' => GetWebhookInfo::class,
        ]);

        $info = $request->send();

        printf("URL: %s\n", $info->url ?: '-');

        printf("HasCustomCertificate: %s\n", $info->hasCustomCertificate ? 'yes' : 'no');

        printf("PendingUpdateCount: %d\n", $info->pendingUpdateCount);

        printf("LastErrorDate: %s\n", empty($info->lastErrorDate) ? '-' :
            date('d.m.Y H:i:s', $info->lastErrorDate)
        );

        printf("LastErrorMessage: %s\n", $info->lastErrorMessage ?: '-');
        printf("MaxConnections: %d\n", $info->maxConnections);

        printf("AllowedUpdates: %s\n", empty($info->allowedUpdates) ? '-' :
            implode(', ', $info->allowedUpdates)
        );
    }

    /**
     * Установить webhook.
     *
     * @throws Exception
     */
    public function actionWebhookSet() : void
    {
        $this->module->installWebHook();
        echo "Done\n";
    }

    /**
     * Удалить webhook.
     *
     * @throws Exception
     */
    public function actionWebhookDelete() : void
    {
        /** @var DeleteWebHook $request */
        $request = $this->module->createRequest([
            'class' => DeleteWebHook::class,
        ]);

        $request->send();
        echo "Done\n";
    }
}
