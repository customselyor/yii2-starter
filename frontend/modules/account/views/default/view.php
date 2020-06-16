<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\UserProfile;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['users']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-default-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($profile->avatar_path) : ?>
            <img src="<?= Yii::getAlias('@storageUrl/avatars/' . $profile->avatar_path) ?>" class="img-thumbnail" alt>
        <?php else: ?>
            <img src="<?= Yii::$app->homeUrl . '/static/img/default.png' ?>" class="img-thumbnail" alt>
        <?php endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => Yii::t('app', 'Firstname'),
                'value' => $profile->firstname,
                'visible' => $profile->firstname !== null,
            ],
            [
                'attribute' => Yii::t('app', 'Lastname'),
                'value' => $profile->lastname,
                'visible' => $profile->lastname !== null,
            ],
            [
                'attribute' => Yii::t('app', 'Birthday'),
                'format' => 'date',
                'value' => $profile->birthday,
                'visible' => $profile->birthday !== null,
            ],
            [
                'attribute' => Yii::t('app', 'Gender'),
                'value' => $profile->gender == UserProfile::GENDER_MALE ? Yii::t('app', 'Male') : Yii::t('app', 'Female'),
                'visible' => $profile->gender !== null,
            ],
            [
                'attribute' => Yii::t('app', 'Website'),
                'format' => 'raw',
                'value' => Html::a($profile->website, $profile->website, ['target'=>'_blank']),
                'visible' => $profile->website !== null,
            ],
            [
                'attribute' => Yii::t('app', 'Other'),
                'value' => $profile->other,
                'visible' => $profile->other !== null,
            ],
            'created_at:datetime',
            'action_at:datetime',
        ],
    ]) ?>

    <p>
        <?php if ($model->id !== Yii::$app->user->id) {
            echo Html::a(Yii::t('app', 'Send email'), ['message', 'id' => $model->id], ['class' => 'btn btn-success']);
        } ?>
    </p>
</div>
