<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lavozim */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lavozims'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lavozim-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
