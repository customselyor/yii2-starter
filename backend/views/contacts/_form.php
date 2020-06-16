<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileApi;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

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
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'legal_name')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'footer_info')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'footer_menu')->widget(CKEditor::className(),
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
                    <?= $form->field($model, 'contacts_info')->widget(CKEditor::className(),
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

                    <?= $form->field($model, 'home_description')->widget(CKEditor::className(),
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


                    <?php $form->field($model, 'address_locality')->textarea(['rows' => 6]); ?>
                    <?php $form->field($model, 'street_address')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]); ?>
                </div>

                <div class="tab-pane fade" id="title_4" role="tabpanel">

                    <?= $form->field($model, 'title_oz')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'legal_name_oz')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'footer_info_oz')->textarea(['rows' => 6]); ?>
                    <?= $form->field($model, 'footer_menu_oz')->widget(CKEditor::className(),
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

                    <?= $form->field($model, 'contacts_info_oz')->widget(CKEditor::className(),
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

                    <?= $form->field($model, 'home_description_oz')->widget(CKEditor::className(),
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


                    <?php $form->field($model, 'address_locality_oz')->textarea(['rows' => 6]); ?>
                    <?php $form->field($model, 'street_address_oz')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'meta_title_oz')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_oz')->textarea(['rows' => 6]); ?>

                </div>
                <div class="tab-pane fade" id="title_2" role="tabpanel">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'legal_name_ru')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'footer_info_ru')->textarea(['rows' => 6]); ?>
                    <?= $form->field($model, 'footer_menu_ru')->widget(CKEditor::className(),
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

                    <?= $form->field($model, 'contacts_info_ru')->widget(CKEditor::className(),
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

                    <?= $form->field($model, 'home_description_ru')->widget(CKEditor::className(),
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


                    <?php $form->field($model, 'address_locality_ru')->textarea(['rows' => 6]); ?>
                    <?php $form->field($model, 'street_address_ru')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'meta_title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_ru')->textarea(['rows' => 6]); ?>
                </div>
                <div class="tab-pane fade" id="title_3" role="tabpanel">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'legal_name_en')->textInput(['maxlength' => true]) ?>
                    <?php $form->field($model, 'footer_info_en')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'footer_menu_en')->widget(CKEditor::className(),
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
                    <?= $form->field($model, 'contacts_info_en')->widget(CKEditor::className(),
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
                    <?= $form->field($model, 'home_description_en')->widget(CKEditor::className(),
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


                    <?php $form->field($model, 'address_locality_en')->textarea(['rows' => 6]); ?>
                    <?php $form->field($model, 'street_address_en')->textarea(['rows' => 6]); ?>

                    <?= $form->field($model, 'meta_title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_en')->textarea(['rows' => 6]); ?>
                </div>

            </div>
            <?= $form->field($model, 'map')->textarea(['rows' => 3]) ?>

        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <br>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Activate')]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone', [
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
            ])->textInput()->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+99999 999-99-99',
                'options' => ['placeholder' => Yii::t('app', 'Phone')]
            ]) ?>

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
            <?= $form->field($model, 'phone2', [
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
            ])->textInput()->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+99999 999-99-99',
            ]) ?>


            <?= $form->field($model, 'fax', [
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
            ])->textInput()->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+99999 999-99-99',
            ]) ?>
            <?= $form->field($model, 'fax2', [
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
            ])->textInput()->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+99999 999-99-99',
            ]) ?>


        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
