<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Slider Items');
?>
<div class="slider-update">
    <p>
        <?php echo Html::a(Yii::t('app', 'Create'), ['/slider-items/create', 'slider_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',

            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->image)
                        return Html::img(env('STORAGE_URL') . '/images/slider/' . $model->image, ['alt' => $model->title, 'width' => '50px']);

                    return null;
                },
            ],
            [
                'attribute' => 'slider_id',
                'value' => function ($model) {
                    return $model->slider ? $model->slider->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\Slider::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
                'filter' => [
                    \common\models\SliderItems::STATUS_DRAFT => Yii::t('app', 'Not active'),
                    \common\models\SliderItems::STATUS_ACTIVE => Yii::t('app', 'Active'),
                ],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {view} {update} ',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['slider-items/delete', 'id' => $model->id], [
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/slider-items/view/' . $model->id, [
                            'title' => Yii::t('app', 'View'),
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', '/slider-items/update/' . $model->id, [
                            'title' => Yii::t('app', 'Update'),
                        ]);
                    },

                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
