<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileApi;
use mihaildev\ckeditor\CKEditor;
use bs\Flatpickr\FlatpickrWidget;

/* @var $this yii\web\View */
/* @var $model common\models\PostCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (count($model->getErrors())>0):?>
        <div class="alert-danger" style="padding: 20px; margin: 10px 0px">
            <?= $form->errorSummary($model); ?>
        </div>
    <?php endif;?>
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

                    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
                    <?= $form->field($model, 'meta_description')->textarea(['rows'=>6, 'class'=>'form-control']) ?>
                </div>
                <div class="tab-pane fade" id="title_4" role="tabpanel">

                    <?= $form->field($model, 'title_oz')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
                    <?= $form->field($model, 'description_oz')->widget(CKEditor::className(),
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
                    <?= $form->field($model, 'meta_title_oz')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
                    <?= $form->field($model, 'meta_description_oz')->textarea(['rows'=>6, 'class'=>'form-control']) ?>

                </div>
                <div class="tab-pane fade" id="title_2" role="tabpanel">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
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
                    <?= $form->field($model, 'meta_title_ru')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
                    <?= $form->field($model, 'meta_description_ru')->textarea(['rows'=>6, 'class'=>'form-control']) ?>

                </div>
                <div class="tab-pane fade" id="title_3" role="tabpanel">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
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
                    <?= $form->field($model, 'meta_title_en')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>

                    <?= $form->field($model, 'meta_description_en')->textarea(['rows'=>6, 'class'=>'form-control']) ?>

                </div>

            </div>
            <?= $form->field($model, 'map')->textInput(['rows' => 6]) ?>

        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">

            <br>

            <?= $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                $parents,
                'id',
                'title'
            ), ['prompt' => '']
            ) ?>

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


            <?= $form->field($model, 'published_at')->widget(FlatpickrWidget::class, [
                'locale' => strtolower(substr(Yii::$app->language, 0, 2)),
                'plugins' => [
                    'confirmDate' => [
                        'confirmIcon' => "<i class='fa fa-check'></i>",
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
                    'allowInput' => false,
                     'defaultDate' => $model->published_at ? date('d-m-Y', $model->published_at) : null,
                    'enableTime' => false,
                    'dateFormat' => "d-m-Y",
                    'time_24hr' => false,
                ],
            ])->label(false) ?>
            <?= $form->field($model, 'key')->textInput() ?>

            <?php $model->status = 1; ?>
            <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Activate')]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>

    </div>



    <?php ActiveForm::end(); ?>

</div>
