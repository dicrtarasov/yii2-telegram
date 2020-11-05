# API Telegram для Yii2

- API https://core.telegram.org/bots/api

## Настройка компонента

```php
'components' => [
    'telegram' => [
        'class' => dicr\telegram\TelegramModule::class,
        'botToken' => 'ваш токен'
    ]
];
```

## Отправка запросов

```php
use dicr\telegram\TelegramModule;
use dicr\telegram\request\SendMessage;

/** @var TelegramModule $module получаем модуль */
$module = Yii::$app->get('telegram');

/** @var SendMessage $request формируем запрос */
$request = $module->createRequest([
    'class' => SendMessage::class,
    'chatId' => 'XXXXXXXXXXXXX',
    'text' => 'Проверка сообщения'
]);

// отправка сообщения
$response = $request->send();
```

## WebHook

Установить/удалить webhook можно из командной строки.

```shell script
# установить webHook
/usr/bin/php yii.php telegram/command/webhook-set

# проверить webhook
/usr/bin/php yii.php telegram/command/webhook-info

# удалить webhook
/usr/bin/php yii.php telegram/command/webhook-delete
```

Для обработки обновлений через webhook нужно настроить функцию-обработчик в конфиге модуля:

```php
use dicr\telegram\entity\Update;
use dicr\telegram\TelegramModule;

'components' => [
    'telegram' => [
        'class' => dicr\telegram\TelegramModule::class,
        'botToken' => 'ваш токен',
        'handler' => static function(Update $update, TelegramModule $module) {
            // обработка обновлений от webhook
        }
    ]
];
```
