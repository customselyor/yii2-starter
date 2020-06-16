<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="posts-update">


    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'genders' => $genders,
        'positions' => $positions,
        'parents' => $parents,
    ]) ?>

</div>
