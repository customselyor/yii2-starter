<?php

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        [
            'pattern' => '<controller>/<action>/<id:\d+>',
            'route' => '<controller>/<action>',
            'suffix' => ''
        ],
        [
            'pattern' => '<controller>/<action>',
            'route' => '<controller>/<action>',
            'suffix' => ''
        ],
        [
            'pattern' => '<module>/<controller>/<action>/<id:\d+>',
            'route' => '<module>/<controller>/<action>',
            'suffix' => ''
        ],
        [
            'pattern' => '<module>/<controller>/<action>',
            'route' => '<module>/<controller>/<action>',
            'suffix' => ''
        ],
//        '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
//        '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
    ],
];
