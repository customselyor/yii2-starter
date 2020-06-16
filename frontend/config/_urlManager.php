<?php
return [
    'class' => 'codemix\localeurls\UrlManager',
    'languages' => ['uz', 'oz', 'ru', 'en'], // List all supported languages here
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'defaultRoute' => 'site/index',
        '<slug>' => 'site/view',
//        'category/<slug>' => 'site/category',
    ],
];

