<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PostCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'key') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'is_favorite') ?>

    <?= $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'month') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'fax2') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'email2') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'phone2') ?>

    <?php // echo $form->field($model, 'phone3') ?>

    <?php // echo $form->field($model, 'passport_seria') ?>

    <?php // echo $form->field($model, 'passport_number') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'og_image') ?>

    <?php // echo $form->field($model, 'detail_image') ?>

    <?php // echo $form->field($model, 'sort_index') ?>

    <?php // echo $form->field($model, 'urlcount') ?>

    <?php // echo $form->field($model, 'map') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'hits_count') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'author_id') ?>

    <?php // echo $form->field($model, 'updater_id') ?>

    <?php // echo $form->field($model, 'extra1') ?>

    <?php // echo $form->field($model, 'extra2') ?>

    <?php // echo $form->field($model, 'extra3') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
