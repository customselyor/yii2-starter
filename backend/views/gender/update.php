<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gender */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="gender-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
