<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:04:01
 */

declare(strict_types = 1);

namespace dicr\telegram;

use dicr\telegram\entity\ResponseParameters;

/**
 * Ответ от сервера.
 *
 * The response contains a JSON object, which always has a Boolean field 'ok' and may have an optional
 * String field 'description' with a human-readable description of the result. If 'ok' equals true,
 * the request was successful and the result of the query can be found in the 'result' field.
 * In case of an unsuccessful request, 'ok' equals false and the error is explained in the 'description'.
 * An Integer 'error_code' field is also returned, but its contents are subject to change in the future.
 * Some errors may also have an optional field 'parameters' of the type ResponseParameters, which can
 * help to automatically handle the error.
 *
 * @link https://core.telegram.org/bots/api
 */
class TelegramResponse extends TelegramEntity
{
    /** результат выполнения запроса */
    public string|int|bool|null $ok = null;

    /**
     * результат
     * If 'ok' equals true, the request was successful and the result of the query can be found
     * in the 'result' field
     */
    public ?string $result = null;

    /**
     * текст ошибки.
     * In case of an unsuccessful request, 'ok' equals false and the error is explained in the 'description'.
     */
    public ?string $description = null;

    /**
     * Integer 'error_code' field is also returned, but its contents are subject to change in the future.
     */
    public int|null $errorCode = null;

    /**
     * параметры повтора запроса в случае ошибки.
     * Some errors may also have an optional field 'parameters' of the type ResponseParameters, which can help
     * to automatically handle the error.
     */
    public array|ResponseParameters|null $parameters = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'parameters' => ResponseParameters::class
        ];
    }
}
