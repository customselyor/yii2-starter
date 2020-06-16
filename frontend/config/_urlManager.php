<?php

return [
    'enablePrettyUrl' => true,
//    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/articles']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'posts'],
    ],

//    'class' => 'yii\web\UrlManager',
//    'enablePrettyUrl' => true,
//    'showScriptName' => false,
//    'rules' => [
//        // Index page
//        '' => 'site/index',
//        // Pages
//        'page/<slug>' => 'page/view',
//        // Articles
//        'article/page/<page>' => 'article/index',
//        'article/index' => 'article/index',
//        'article/<slug>' => 'article/view',
//        'article/category/<slug>' => 'article/category',
//        'article/tag/<slug>' => 'article/tag',
//    ],
];
