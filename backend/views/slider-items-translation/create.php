<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItemsTranslation */

$this->title = Yii::t('app', 'Create Slider Items Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider Items Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-items-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
