<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tuman */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tuman'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tuman-update">
    <?= $this->render('_form', [
        'model' => $model,
        'viloyatlar' => $viloyatlar,
    ]) ?>
</div>
