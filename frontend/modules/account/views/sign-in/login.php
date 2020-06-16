<?php
$authorizationurl = "https://sso.gov.uz:8443/sso/oauth/Authorization.do";
$clientid = "adp.gov.uz";
$clientsecret = "adp.gov.uz";
$scope = "adp.gov.uz";
$stateArr = array('method' => 'PKI');
$state = json_encode($stateArr);
$state = base64_encode ($state);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
</head>
<body>
<form name="OAuthForm" action="<?= $authorizationurl ?>" method="get" />
<input type="hidden" name="response_type" value="one_code" />
<input type="hidden" name="client_id" value="<?= $clientid ?>" />
<input type="hidden" name="redirect_uri" value="http://havolalar.loc/php/access_token.php" />
<input type="hidden" name="scope" value="<?= $scope ?>" />
-<input type="hidden" name="state" value="<?= $state ?>" />
</form>

<script type="text/javascript">
    document.OAuthForm.submit();
</script>
</body>
</html>

<div class="account-sign-in-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'identity')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <div class="btn-group">
                <?php if (Yii::$app->keyStorage->get('frontend.registration')) {
                    echo Html::a(Yii::t('app', 'Signup'), ['sign-in/signup'], ['class' => 'btn btn-success']);
                }?>

                <?= Html::a(Yii::t('app', 'Lost password'), ['sign-in/request-password-reset'], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end() ?>
</div>
