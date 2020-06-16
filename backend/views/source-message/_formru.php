<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <?= $form->field($model, '[1]id')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, '[1]language')->hiddenInput(['maxlength' => true, 'value' => 'ru'])->label(false) ?>

    <?= $form->field($model, '[1]translation')->textarea(['rows' => 6])->label(false) ?>
