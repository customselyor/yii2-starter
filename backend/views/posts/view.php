<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Widget items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'category.title',
            'lavozim.title',
            'gender.title',

            [
                'attribute' => 'is_favorite',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->is_favorite ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
            ],
            'date_of_birth',
            'year',
            'month',
            'day',
            'age',
            'fax',
            'fax2',
            'email:email',
            'email2:email',
            'phone',
            'phone2',
            'phone3',
            'passport_seria',
            'passport_number',
            'inn',

            [
                'attribute' => 'logo',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->image){
                        return Html::img(env('STORAGE_URL') . '/images/posts/' . $model->logo, ['alt' => $model->title, 'width' => '50px']);
                    }else{
                        return null;
                    }
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->image){
                        return Html::img(env('STORAGE_URL') . '/images/posts/' . $model->image, ['alt' => $model->title, 'width' => '50px']);
                    }else{
                        return null;
                    }
                },
            ],
            [
                'attribute' => 'og_image',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->og_image)
                        return Html::img(env('STORAGE_URL') . '/images/posts/' . $model->og_image, ['alt' => $model->title, 'width' => '50px']);
                },
            ],
            [
                'attribute' => 'detail_image',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->detail_image)
                        return Html::img(env('STORAGE_URL') . '/images/posts/' . $model->detail_image, ['alt' => $model->title, 'width' => '50px']);
                },
            ],
            'map:ntext',
            'latitude',
            'longitude',
            'parent.title',
            [
                'attribute' => 'published_at',
                'format' => 'html',
                'label' => Yii::t('app', 'Published At'),
                'value' => function ($model) {
                    if ($model->created_at) {
                        return Yii::$app->formatter->asDate($model->published_at);
                    } else {
                        return $model->created_at;
                    }
                },
            ],
            'author.username',
            'updater.username',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
            ],
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
