<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'suffix' => '/',
            'rules' => [
                'article' => 'article/index',
                'article/<code:[a-z0-9\-_]+>' => 'article/detail',
                'event' => 'event/index',
                'event/<code:[a-z0-9\-_]+>' => 'event/detail',
            ],
        ],
        'assetManager' => [
            'converter' => [
                'class' => 'nizsheanez\assetConverter\Converter'
            ]
        ],
    ],
    'params' => $params,
];
