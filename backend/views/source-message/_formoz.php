<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $form->field($model, '[3]id')->hiddenInput(['rows' => 6])->label(false) ?>

<?= $form->field($model, '[3]language')->hiddenInput(['maxlength' => true, 'value' => 'oz'])->label(false) ?>

<?= $form->field($model, '[3]translation')->textarea(['rows' => 6])->label(false) ?>
