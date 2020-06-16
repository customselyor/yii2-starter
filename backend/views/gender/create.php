<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gender */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-create">

     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
