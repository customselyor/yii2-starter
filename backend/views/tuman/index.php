<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tuman');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuman-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'viloyat_id',
                'value' => function ($model) {
                    return $model->viloyat ? $model->viloyat->title : null;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Viloyat::find()->localized(Yii::$app->language)->all(), 'id', 'title'),
            ],
            'title',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
                'filter' => [
                    \common\models\Tuman::STATUS_DRAFT => Yii::t('app', 'Not active'),
                    \common\models\Tuman::STATUS_ACTIVE => Yii::t('app', 'Active'),
                ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
