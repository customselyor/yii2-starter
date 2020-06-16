<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileApi;
use backend\widgets\TinyMCECallback;
use dosamigos\tinymce\TinyMce;
use mihaildev\ckeditor\CKEditor;
use bs\Flatpickr\FlatpickrWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (count($model->getErrors())>0):?>
        <div class="alert-danger" style="padding: 20px; margin: 10px 0px">
            <?= $form->errorSummary($model); ?>
        </div>
    <?php endif;?>

            <!-- Titles -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#title_1">O'zbekcha</a></li>
                <li><a data-toggle="tab" href="#title_4">Ўзбекча</a></li>
                <li><a data-toggle="tab" href="#title_2">Русские</a></li>
                <li><a data-toggle="tab" href="#title_3">English</a></li>
            </ul>
            <div class="tab-content card">
                <div class="tab-pane fade in active" id="title_1" role="tabpanel">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class'=>'form-control title']) ?>

                </div>
                <div class="tab-pane fade" id="title_4" role="tabpanel">

                    <?= $form->field($model, 'title_oz')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>


                </div>
                <div class="tab-pane fade" id="title_2" role="tabpanel">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>


                </div>
                <div class="tab-pane fade" id="title_3" role="tabpanel">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>


                </div>

            </div>



    <?php ActiveForm::end(); ?>

</div>
