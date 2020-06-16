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

    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <!-- Titles -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#title_1">O'zbekcha</a></li>
                <li><a data-toggle="tab" href="#title_2">Русские</a></li>
                <li><a data-toggle="tab" href="#title_3">English</a></li>
            </ul>
            <div class="tab-content card">
                <div class="tab-pane fade in active" id="title_1" role="tabpanel">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class'=>'form-control title']) ?>
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'class'=>'form-control slug']) ?>

                    <?= $form->field($model, 'description')->widget(CKEditor::className(),
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
                </div>
                <div class="tab-pane fade" id="title_2" role="tabpanel">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'class'=>'form-control titleru']) ?>
                    <?= $form->field($model, 'slug_ru')->textInput(['maxlength' => true, 'class'=>'form-control slugru']) ?>

                    <?= $form->field($model, 'description_ru')->widget(CKEditor::className(),
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

                </div>
                <div class="tab-pane fade" id="title_3" role="tabpanel">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'class'=>'form-control titleen']) ?>
                    <?= $form->field($model, 'slug_en')->textInput(['maxlength' => true, 'class'=>'form-control slugen']) ?>

                    <?= $form->field($model, 'description_en')->widget(CKEditor::className(),
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


                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <br>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?= $form->field($model, 'published_at')->widget(FlatpickrWidget::class, [
                'locale' => strtolower(substr(Yii::$app->language, 0, 2)),
//                'locale' => strtolower(substr(Yii::$app->language, 0, 2)),
                'plugins' => [
                    'confirmDate' => [
                        'confirmIcon'=> "<i class='fa fa-check'></i>",
                        'confirmText' => 'OK',
                        'showAlways' => false,
                        'theme' => 'light',
                    ],
                ],
                'groupBtnShow' => true,
                'options' => [
                    'class' => 'form-control',
                ],
                'clientOptions' => [
                    'allowInput' => true,
                    'defaultDate' => $model->published_at ? date(DATE_ATOM, $model->published_at) : null,
                    'enableTime' => true,
                    'time_24hr' => true,
                ],
            ]) ?>
            <?php $model->status = 1; ?>

            <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Activate')]) ?>
            <?= $form->field($model, 'is_favorite')->checkbox() ?>

            <?= $form->field($model, 'post_category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                $categories,
                'id',
                'title'
            )) ?>

            <?=$form->field($model, 'hits_count')->textInput([
                                 'type' => 'number'
                            ])?>


            <?= $form->field($model, 'image')->widget(FileApi::className(), [
                'settings' => [
                    'url' => ['/site/fileapi-upload'],
                ],
            ]) ?>

            <?= $form->field($model, 'og_image')->widget(FileApi::className(), [
                'settings' => [
                    'url' => ['/site/fileapi-upload'],
                ],
            ]) ?>

            <?= $form->field($model, 'detail_image')->widget(FileApi::className(), [
                'settings' => [
                    'url' => ['/site/fileapi-upload'],
                ],
            ]) ?>

        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
