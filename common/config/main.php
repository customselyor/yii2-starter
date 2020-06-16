<?php

$config = [
    'name'=>'EK-CMS',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require __DIR__ . '/../../vendor/yiisoft/extensions.php',
    'timeZone' => env('TIMEZONE'),
    'sourceLanguage' => env('LANGUAGE'),
    'language' => env('LANGUAGE'),
    'bootstrap' => ['log'],
    'modules' => [
        'noty' => [
            'class' => 'lo\modules\noty\Module',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
            'enableSchemaCache' => YII_ENV_PROD,
            'enableQueryCache' => true,
            'queryCacheDuration' => 5, // five seconds
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'linkAssets' => env('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV,
        ],
        'log' => [
            'traceLevel' => YII_ENV_DEV ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix' => function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;

                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars' => [],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'ru-RU',

                    // 'basePath' => '@common/messages',
                    // 'fileMap' => [
                    //     'app' => 'app.php',
                    //     'app/error' => 'error.php',
                    // ],
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                        'backend' => 'backend.php',
                        'frontend' => 'frontend.php',
                    ],
                ],
            ],
        ],
        'keyStorage' => [
            'class' => 'common\components\keyStorage\KeyStorage',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            // send all mails to a file by default. You have to set
//            // 'useFileTransport' to false and configure a transport
//            // for the mailer to send real emails.
//            'useFileTransport' => YII_ENV_DEV,
//        ],
        'mailer' => [
            //            'useFileTransport' => YII_ENV_DEV,
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // 'useFileTransport' => true,
//            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'karimovelyor@gmail.com',
                'password' => 'assalom1988',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cache' => [
            'class' => YII_ENV_DEV ? 'yii\caching\DummyCache' : 'yii\caching\FileCache',
        ],
    ],
];

return $config;
