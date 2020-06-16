<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

    <?= $form->field($model, '[2]id')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, '[2]language')->hiddenInput(['maxlength' => true, 'value' => 'en'])->label(false) ?>

    <?= $form->field($model, '[2]translation')->textarea(['rows' => 6])->label(false) ?>
