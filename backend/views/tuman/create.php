<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tuman */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tuman'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuman-create">


    <?= $this->render('_form', [
        'model' => $model,
        'viloyatlar' => $viloyatlar,
    ]) ?>

</div>
