<?php

namespace frontend\modules\v1\controllers;

use common\models\LoginForm;
use common\models\User;
use sizeg\jwt\Jwt;
use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;
use yii\web\Response;

class AuthController extends ActiveController
{
    public $modelClass = 'common\models\User';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtHttpBearerAuth::class,
            'optional' => [
                'login',
            ],
        ];

        return $behaviors;
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {

            /** @var Jwt $jwt */
            $jwt = Yii::$app->jwt;
            $signer = $jwt->getSigner('HS256');
            $key = $jwt->getKey();
            $time = time();
            // Adoption for lcobucci/jwt ^4.0 version
            $token = $jwt->getBuilder()
                ->issuedBy('http://example.com')// Configures the issuer (iss claim)
                ->permittedFor('http://example.org')// Configures the audience (aud claim)
                ->identifiedBy('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
                ->issuedAt($time)// Configures the time that the token was issue (iat claim)
                ->expiresAt($time + 3600)// Configures the expiration time of the token (exp claim)
                ->withClaim('uid', Yii::$app->user->identity->getId())// Configures a new claim, called "uid"
                ->getToken($signer, $key); // Retrieves the generated token

            return ['access_token' => (string)$token];
        } else {
            $model->validate();
            return $model;
        }


    }

    /**
     * @return \yii\web\Response
     */
    public function actionData()
    {
        return $this->asJson([
            'success' => true,
        ]);
    }


}
