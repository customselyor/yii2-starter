<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php'
);

$config = [
    'id' => 'app-frontend',
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'account' => [
            'class' => 'frontend\modules\account\Module',
        ],
        'v1' => [
            'class' => 'frontend\modules\v1\Module',
        ],
        'noty' => [
            'class' => 'lo\modules\noty\Module',
        ],
    ],
    'components' => [
        'jwt' => [
            'class' => \sizeg\jwt\Jwt::class,
            'key' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            // You have to configure ValidationData informing all claims you want to validate the token.
            'jwtValidationData' => \common\components\JwtValidationData::class,
        ],
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
//            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
//            'loginUrl'=>['/account/sign-in/login'],
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'app-frontend',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require __DIR__ . '/_urlManager.php',
        'cache' => require __DIR__ . '/_cache.php',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*'],
    ];
}

if (YII_ENV_PROD) {
    // maintenance mode
    $config['bootstrap'] = ['maintenance'];
    $config['components']['maintenance'] = [
        'class' => 'common\components\maintenance\Maintenance',
        'enabled' => env('MAINTENANCE_MODE'),
        'route' => 'maintenance/index',
        'message' => env('MAINTENANCE_MODE_MESSAGE'),
        // year-month-day hour:minute:second
        'time' => env('MAINTENANCE_MODE_TIME'), // время окончания работ
    ];
}

return $config;
