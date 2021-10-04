<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.10.21 00:49:53
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
 * WEB-контроллер обработки callback webhook от сервера Telegram.
 *
 * @property-read TelegramModule $module
 */
class CallbackController extends Controller
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
    public function actionIndex(): Response
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
