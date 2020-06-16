<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileApi;
use backend\widgets\TinyMCECallback;
use dosamigos\tinymce\TinyMce;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-items-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
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
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'class'=>'form-control title']) ?>

                    <?= $form->field($model, 'body')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 350,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                    <?= $form->field($model, 'meta_description')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 200,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>

                </div>
                <div class="tab-pane fade" id="title_4" role="tabpanel">

                    <?= $form->field($model, 'title_oz')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'slug_oz')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'body_oz')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 350,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                    <?= $form->field($model, 'meta_description_oz')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 200,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                </div>
                <div class="tab-pane fade" id="title_2" role="tabpanel">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'slug_ru')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'body_ru')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 350,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                    <?= $form->field($model, 'meta_description_ru')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 200,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                </div>
                <div class="tab-pane fade" id="title_3" role="tabpanel">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'slug_en')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>

                    <?= $form->field($model, 'body_en')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 350,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                    <?= $form->field($model, 'meta_description_en')->widget(CKEditor::className(),
                        [
                            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder',
                                [
                                    'height' => 200,
                                    'preset' => 'full',
                                    'autoParagraph' => false,
                                    'allowedContent' => true,
                                    'extraPlugins' => 'youtube',
                                ]),
                        ]
                    ); ?>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <br>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Activate')]) ?>


            <?= $form->field($model, 'image')->widget(FileApi::className(), [
                'settings' => [
                    'url' => ['/site/fileapi-upload'],
                ],
            ]) ?>

            <?= $form->field($model, 'backgroun_image')->widget(FileApi::className(), [
                'settings' => [
                    'url' => ['/site/fileapi-upload'],
                ],
            ]) ?>
        </div>
    </div>
    <?= $form->field($model, 'slider_id')->hiddenInput(['value'=>$slider_id])->label(false) ?>


    <?php ActiveForm::end(); ?>

</div>
