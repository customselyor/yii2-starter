<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Genders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-index">


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

            'title',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
                'filter' => [
                    \common\models\Gender::STATUS_DRAFT => Yii::t('app', 'Not active'),
                    \common\models\Gender::STATUS_ACTIVE => Yii::t('app', 'Active'),
                ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
