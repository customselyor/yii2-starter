<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->hiddenInput(['maxlength' => true, 'value'=>'app'])->label(false) ?>

    <?= $form->field($model, 'message')->textInput(['rows' => 6]) ?>

    <?= \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => 'O\'zbekcha',
                'content' => $this->render('_formuz', ['model' => $messages[0], 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'Ўзбекча',
                'content' => $this->render('_formoz', ['model' => $messages[3], 'form' => $form]),
            ],
            [
                'label' => 'Русский',
                'content' => $this->render('_formru', ['model' => $messages[1], 'form' => $form]),
            ],
            [
                'label' => 'English',
//                 'content' => 'RU contenr goes here',
                'content' => $this->render('_formen', ['model' => $messages[2], 'form' => $form]),
            ],
        ]]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
