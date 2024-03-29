<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 03.10.21 05:14:53
 */

/** @noinspection PhpUnhandledExceptionInspection */
declare(strict_types = 1);

/** string */
const YII_ENV = 'dev';

/** bool */
const YII_DEBUG = true;

require_once(dirname(__DIR__) . '/vendor/autoload.php');
require_once(dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php');

new yii\console\Application([
    'id' => 'test',
    'basePath' => dirname(__DIR__),
    'components' => [
        'cache' => [
            'class' => yii\caching\FileCache::class
        ],
        'log' => [
            'flushInterval' => 1,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning', 'info', 'trace']
                ]
            ]
        ],
        'urlManager' => [
            'hostInfo' => 'https://dicr.org',
            'baseUrl' => '',
            'scriptUrl' => '/index.php'
        ]
    ],
    'modules' => [
        'telegram' => [
            'class' => dicr\telegram\TelegramModule::class,
            'botToken' => 'ваш токен'
        ]
    ],
    'bootstrap' => ['log']
]);
