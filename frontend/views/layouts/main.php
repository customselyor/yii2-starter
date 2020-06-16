<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\models\NavItem;
use lo\modules\noty\Wrapper;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

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
        'items' => $menuItems,
    ]);
    NavBar::end() ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Wrapper::widget() ?>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>
    $(function() {
        // var conn = new WebSocket('ws://localhost:8080');
        // conn.onmessage = function(e) {
        //     console.log('Response:' + e.data);
        // };
        // conn.onopen = function(e) {
        //     console.log('ping');
        //     conn.send('ping');
        // };
        var chat = new WebSocket('ws://localhost:8080');
        chat.onmessage = function(e) {
            $('#response').text('');

            var response = JSON.parse(e.data);
            if (response.type && response.type == 'chat') {
                $('#chat').append('<div><b>' + response.from + '</b>: ' + response.message + '</div>');
                $('#chat').scrollTop = $('#chat').height;
            } else if (response.message) {
                $('#response').text(response.message);
            }
        };
        chat.onopen = function(e) {
            $('#response').text("Connection established! Please, set your username.");
        };
        $('#btnSend').click(function() {
            if ($('#message').val()) {
                chat.send( JSON.stringify({'action' : 'chat', 'message' : $('#message').val()}) );
            } else {
                alert('Enter the message')
            }
        })

        $('#btnSetUsername').click(function() {
            if ($('#username').val()) {
                chat.send( JSON.stringify({'action' : 'setName', 'name' : $('#username').val()}) );
            } else {
                alert('Enter username')
            }
        })
    })
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
