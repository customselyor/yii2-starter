<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use common\assets\Highlight;
use dosamigos\disqus\Comments;
/* @var $this yii\web\View */
/* @var $model common\models\Article */
Highlight::register($this);
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <article class="article-item">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="article-meta">
            <span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asDatetime($model->published_at) ?>
            <?php if (($model->category)):?>
                <span class="glyphicon glyphicon-folder-close"></span> <?= Html::a($model->category->title, ['article/category', 'slug' => $model->category->slug]) ?>
            <?php endif;?>
            <span class="glyphicon glyphicon-user"></span> <?= $model->author->username ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="article-text">
                    <?= HtmlPurifier::process($model->body) ?>
                </div>
            </div>

        </div>
    </article>
</div>
