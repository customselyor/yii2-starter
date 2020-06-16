<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'post_category_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'is_favorite') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'og_image') ?>

    <?php // echo $form->field($model, 'detail_image') ?>

    <?php // echo $form->field($model, 'sort_index') ?>

    <?php // echo $form->field($model, 'urlcount') ?>

    <?php // echo $form->field($model, 'hits_count') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
