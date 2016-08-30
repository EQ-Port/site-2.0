<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'Рок-Портал EQUILIBRIUM',
    'components' => [
        'db' => [
//            'enableSchemaCache' => true,
//            'schemaCacheDuration' => 86400,
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
			 'defaultRoles' => [
                'administrator',
                'leading',
                'article',
                'partner',
				'user'
            ],
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => false,
            'showScriptName' => false,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'roles' => 'roles.php',
                    ]
                ],
            ],
        ],
    ],
    'language' => 'ru_RU',
];
