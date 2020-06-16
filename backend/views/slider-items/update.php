<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItems */

$this->title = $model->slider->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider Items'), 'url' => ['/slider/update/'.$model->slider_id]];

$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['slider-items/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="slider-items-update">

    <?= $this->render('_form', [
        'model' => $model,
        'slider' => $slider,
        'slider_id' => $slider_id,
    ]) ?>

</div>
