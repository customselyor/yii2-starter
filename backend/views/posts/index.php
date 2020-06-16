<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

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
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category ? $model->category->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\PostCategory::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'lavozim_id',
                'value' => function ($model) {
                    return $model->lavozim ? $model->lavozim->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\Lavozim::find()->active()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'gender_id',
                'value' => function ($model) {
                    return $model->gender ? $model->gender->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\Gender::find()->active()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return $model->parent ? $model->parent->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\Posts::find()->noParents()->active()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                },
                'filter' => [
                    \common\models\Posts::STATUS_DRAFT => Yii::t('app', 'Not active'),
                    \common\models\Posts::STATUS_ACTIVE => Yii::t('app', 'Active'),
                ],
            ],
            //'is_favorite',
            //'date_of_birth',
            //'year',
            //'month',
            //'day',
            //'age',
            //'fax',
            //'fax2',
            //'email:email',
            //'email2:email',
            //'phone',
            //'phone2',
            //'phone3',
            //'passport_seria',
            //'passport_number',
            //'inn',
            //'avatar',
            //'logo',
            //'icon',
            //'image',
            //'og_image',
            //'detail_image',
            //'sort_index',
            //'urlcount',
            //'map:ntext',
            //'latitude',
            //'longitude',
            //'hits_count',
            //'parent_id',
            //'published_at',
            //'author_id',
            //'updater_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
