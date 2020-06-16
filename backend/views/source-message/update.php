<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SourceMessage */

$this->title = $model->message;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="source-message-update">

    <?= $this->render('_form', [
        'model' => $model,
        'messages' => $messages,
    ]) ?>

</div>
