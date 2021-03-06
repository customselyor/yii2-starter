<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SliderItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'slider_id') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'backgroun_image') ?>

    <?= $form->field($model, 'extra_image') ?>

    <?php // echo $form->field($model, 'extra_1image') ?>

    <?php // echo $form->field($model, 'extra_2image') ?>

    <?php // echo $form->field($model, 'extra_3image') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
