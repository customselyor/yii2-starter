<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lavozim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lavozim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (count($model->getErrors())>0):?>
        <div class="alert-danger" style="padding: 20px; margin: 10px 0px">
            <?= $form->errorSummary($model); ?>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?= $this->render('../globalforms/_spavochnik', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <br>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php $model->status = 1; ?>
            <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Activate')]) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
