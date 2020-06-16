<?php


namespace frontend\modules\v1\controllers;


use frontend\resources\Region;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class V1BaseController extends ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];
        return $behaviors;
    }

    public function beforeAction($action)
    {
        Yii::$app->setComponents([
            'response' => [
                'class' => 'yii\web\Response',
                'on beforeSend' => function ($event) {
                    $response = $event->sender;
                    if ($response->data !== null) {
                        $response->data = [
                            'success' => $response->isSuccessful,
                            'data' => $response->data,
                        ];
                        $response->statusCode = 200;
                    }
                },
            ],
        ]);
        //return true;
        return parent::beforeAction($action);
    }

    /**
     *
     *
     * @param string $action
     * @param Region| $model
     * @param array $params
     * @throws ForbiddenHttpException
     * @author Elyor Karimov <karimovelyor@gmail.com>
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
            throw new ForbiddenHttpException("You do not have permission to change this record");
        }
    }
}