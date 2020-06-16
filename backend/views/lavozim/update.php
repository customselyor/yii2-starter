<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lavozim */

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lavozims'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lavozim-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
