<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'key',
            [
                'attribute' => 'created_at',
                'format' => 'html',
                'label' => Yii::t('app', 'Created at'),
                'value' => function ($model) {
                    if ($model->created_at) {
                        return Yii::$app->formatter->asDatetime($model->created_at);
                    } else {
                        return $model->created_at;
                    }
                },
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'html',
                'label' => Yii::t('app', 'Updated at'),
                'value' => function ($model) {
                    if ($model->updated_at) {
                        return Yii::$app->formatter->asDatetime($model->updated_at);
                    } else {
                        return $model->updated_at;
                    }
                },
            ],
        ],
    ]) ?>

</div>
