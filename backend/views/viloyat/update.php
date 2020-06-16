<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Viloyat */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Viloyats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="viloyat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
