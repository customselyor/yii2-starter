<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

	<?= $form->field($model, '[0]id')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, '[0]language')->hiddenInput(['maxlength' => true, 'value' => 'uz'])->label(false) ?>

    <?= $form->field($model, '[0]translation')->textarea(['rows' => 6])->label(false) ?>
