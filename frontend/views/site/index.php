<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Welcome !!!</h1>
        <?= \yii\helpers\Html::a('link-name', ['/site/view?id=1'], [
            'data'=>[
                'method' => 'post',
                'params'=>['category'=>'132465'],
            ]])
        ?>
    </div>
</div>
