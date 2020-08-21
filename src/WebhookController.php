<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 22.08.20 00:08:17
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
    public function actionIndex()
    {
        if (! Yii::$app->request->isPost) {
            throw new BadRequestHttpException();
        }

        Yii::debug('Webhook запрос: ' . Yii::$app->request->rawBody);

        $ret = true;

        // вызываем пользовательский обработчик
        if (! empty($this->module->callback)) {
            $update = new Update(Yii::$app->request->bodyParams);
            $ret = call_user_func($this->module->callback, $update, $this->module);
        }

        return $this->asJson($ret);
    }
}