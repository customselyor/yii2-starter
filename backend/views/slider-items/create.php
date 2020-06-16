<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItems */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider Items'), 'url' => ['/slider/update/'.$slider_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-items-create">

    <?= $this->render('_form', [

        'model' => $model,
        'slider' => $slider,
        'slider_id' => $slider_id,
    ]) ?>

</div>
