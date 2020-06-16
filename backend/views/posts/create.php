<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Widget items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-create">

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'genders' => $genders,
        'positions' => $positions,
        'parents' => $parents,
    ]) ?>

</div>
