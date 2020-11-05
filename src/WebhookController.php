<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:48:34
 */

declare(strict_types = 1);

namespace dicr\telegram;

use dicr\telegram\entity\Update;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

use function call_user_func;

/**
 * Class WebhookController
 *
 * @property-read TelegramModule $module
 */
class WebhookController extends Controller
{
    /**
     * @inheritDoc
     * Отключаем CSRF для запросов от Telegram.
     */
    public $enableCsrfValidation = false;

    /**
     * Индекс.
     *
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionIndex() : Response
    {
        if (! Yii::$app->request->isPost) {
            throw new BadRequestHttpException();
        }

        Yii::debug('Webhook: ' . Yii::$app->request->rawBody);

        $ret = true;

        // вызываем пользовательский обработчик
        if (! empty($this->module->handler)) {
            $update = new Update([
                'json' => Yii::$app->request->bodyParams
            ]);

            $ret = call_user_func($this->module->handler, $update, $this->module);
        }

        return $this->asJson($ret);
    }
}
