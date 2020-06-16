<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserProfile;
use bs\Flatpickr\FlatpickrWidget;
use vova07\fileapi\Widget as FileApi;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-default-settings">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Change password'), ['password'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->widget(FlatpickrWidget::class, [
        'locale' => strtolower(substr(Yii::$app->language, 0, 2)),
        'groupBtnShow' => true,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'allowInput' => true,
            'defaultDate' => $model->birthday ? date(DATE_ATOM, $model->birthday) : null,
        ],
    ]) ?>

    <?= $form->field($model, 'avatar_path')->widget(FileApi::class, [
        'settings' => [
            'url' => ['/site/fileapi-upload'],
        ],
        'crop' => true,
        'cropResizeWidth' => 100,
        'cropResizeHeight' => 100,
    ]) ?>

    <?= $form->field($model, 'gender')->dropDownlist([
        UserProfile::GENDER_MALE => Yii::t('app', 'Male'),
        UserProfile::GENDER_FEMALE => Yii::t('app', 'Female'),
    ], ['prompt' => '']) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>
