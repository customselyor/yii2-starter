<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\ArrayHelper;
use frontend\models\NavItem;

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('frontend', 'Login'), 'url' => ['/account/sign-in/login']];
} else {
    $menuItems[] = [
        'label' => Yii::$app->user->identity->username,
        'url' => '#',
        'items' => [
            ['label' => Yii::t('frontend', 'Settings'), 'url' => ['/account/default/settings']],
            [
                'label' => Yii::t('frontend', 'Backend'),
                'url' => env('BACKEND_URL'),
                'linkOptions' => ['target' => '_blank'],
                'visible' => Yii::$app->user->can('administrator'),
            ],
            [
                'label' => Yii::t('frontend', 'Logout'),
                'url' => ['/account/sign-in/logout'],
                'linkOptions' => ['data-method' => 'post'],
            ],
        ],
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => ArrayHelper::merge(NavItem::getMenu('header-menu'), $menuItems),
]);
NavBar::end() ?>

