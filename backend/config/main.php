<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php'
);

$config = [
    'id' => 'app-backend',
    'homeUrl' => env('BACKEND_URL'),
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'dashboard/index',
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'name'=>'Global',
                    'basePath' => '@storage',
                    'path' => '/',
                    'access' => ['read' => 'administrator', 'write' => 'administrator'],
                    'options' => [
                        'attributes' => [
                            [
                                'pattern' => '#.*(\.gitignore|\.htaccess)$#i',
                                'read' => true,
                                'write' => true,
                                'hidden' => true,
                                'locked' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '',
            // 'baseUrl' => '/backend',
            
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'app-backend',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require __DIR__ . '/_urlManager.php',
        'frontendCache' => require Yii::getAlias('@frontend/config/_cache.php'),
    ],
    'modules' => [

        'db-manager' => [
            'class' => 'bs\dbManager\Module',
            // path to directory for the dumps
            'path' => '@root/backups',
            // list of registerd db-components
            'dbList' => ['db'],
            'as access' => [
                'class' => 'backend\behaviors\GlobalAccessBehavior',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['administrator'],
                    ],
                ],
            ],
        ],
        'phpsysinfo' => [
            'class' => 'bs\phpSysInfo\Module',
            'as access' => [
                'class' => 'backend\behaviors\GlobalAccessBehavior',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['administrator'],
                    ],
                ],
            ],
        ],
        'rbac' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'as access' => [
                'class' => 'backend\behaviors\GlobalAccessBehavior',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['administrator'],
                    ],
                ],
            ],
        ],
    ],
    'as globalAccess' => [
        'class' => 'backend\behaviors\GlobalAccessBehavior',
        'rules' => [
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['login'],
                'roles' => ['?'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['logout'],
                'roles' => ['@'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['error'],
                'roles' => ['?', '@'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers' => ['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['manager'],
            ],
        ],
    ],
    'as beforeAction' => [
        'class' => 'backend\behaviors\LastActionBehavior',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*', 'fe80::4483:58ab:8351:95a9', '217.29.122.69'],
        'as access' => [
            'class' => 'backend\behaviors\GlobalAccessBehavior',
            'rules' => [
                [
                    'allow' => true,
                ],
            ],
        ],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*', 'fe80::4483:58ab:8351:95a9', '217.29.122.69'],
        'as access' => [
            'class' => 'backend\behaviors\GlobalAccessBehavior',
            'rules' => [
                [
                    'allow' => true,
                ],
            ],
        ],
    ];
}

return $config;
