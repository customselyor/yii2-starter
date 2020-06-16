<?php

namespace frontend\modules\v1\controllers;

use common\models\Article;
use http\Url;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\HttpHeaderAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\HttpException;

class ArticlesController extends ActiveController
{
    public $modelClass = 'common\models\Article';
//    public function __construct($id, $module, $config = [])
//    {
//        parent::__construct($id, $module, $config);
//    }
//
//    public function actions()
//    {
//        return [];
//    }
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                HttpHeaderAuth::class,
                QueryParamAuth::class
            ]
        ];

        return $behaviors;
    }

//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                HttpBearerAuth::className(),
//            ],
//
//        ];
//
//        $behaviors['verbs'] = [
//            'class' => \yii\filters\VerbFilter::className(),
//            'actions' => [
//                'index' => ['get'],
//                'view' => ['get'],
//                'create' => ['post'],
//                'update' => ['put'],
//                'delete' => ['delete'],
//                'public' => ['get'],
//            ],
//        ];
//
//        // remove authentication filter
//        $auth = $behaviors['authenticator'];
//        unset($behaviors['authenticator']);
//
//        // add CORS filter
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//            'cors' => [
//                'Origin' => ['*'],
//                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
//                'Access-Control-Request-Headers' => ['*'],
//            ],
//        ];
//
//        // re-add authentication filter
//        $behaviors['authenticator'] = $auth;
//        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
//        $behaviors['authenticator']['except'] = ['options', 'public', 'create'];
//
//        // setup access
//        $behaviors['access'] = [
//            'class' => AccessControl::className(),
//            'only' => ['index', 'view',  'update', 'delete'], //only be applied to
//            'rules' => [
//                [
//                    'allow' => true,
//                    'actions' => ['index', 'view', 'update', 'delete'],
//                    'roles' => ['admin', 'administrator', 'manageSettings'],
//                ],
//            ],
//        ];
//
//        return $behaviors;
//    }

//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//
//        // remove authentication filter
//        $auth = $behaviors['authenticator'];
//        unset($behaviors['authenticator']);
//
//        // add CORS filter
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//            'cors' => [
//                // restrict access to
//                'Origin' => ['http://localhost:3000', 'http://www.myserver.com', 'https://www.myserver.com'],
//                // Allow only POST and PUT methods
//                'Access-Control-Request-Method' => ['POST', 'PUT'],
//                // Allow only headers 'X-Wsse'
//                'Access-Control-Request-Headers' => ['X-Wsse'],
//                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
//                'Access-Control-Allow-Credentials' => true,
//                // Allow OPTIONS caching
//                'Access-Control-Max-Age' => 3600,
//                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
//                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
//            ],
//        ];
//
//        // re-add authentication filter
//        $behaviors['authenticator'] = $auth;
//        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
//        $behaviors['authenticator']['except'] = ['options'];
//
//        return $behaviors;
//    }

    /**
     * Create new setting
     *
     * @return Article
     * @throws HttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        $model = new Article();

        $bodyParam = \Yii::$app->getRequest()->getBodyParams();
        if (isset($bodyParam['meta_key'])) {
            $bodyParam['meta_key'] = strtolower($bodyParam['meta_key']);
        }
        $model->load($bodyParam, '');
        if ($model->validate() && $model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', \yii\helpers\Url::toRoute([$id], true));
        } else {
            // Validation error
            throw new HttpException(422, json_encode($model->errors));
        }

        return $model;
    }
    /**
     * Return public settings
     *
     * @return array
     */
    public function actionPublic()
    {
        $publicSettings = [];

//        $settings = Setting::find()->where(
//            [
//                'is_public' => 1,
//                'status' => 1,
//            ]
//        )->all();
//
//        if ($settings) {
//            foreach ($settings as $settingKey => $setting) {
//                $publicSettings[] = [
//                    'meta_key' => $setting['meta_key'],
//                    'meta_type' => $setting['meta_type'],
//                    'meta_value' => $setting['meta_value']
//                ];
//            }
//        }

        return $publicSettings;
    }
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Article::find(),
        ]);
    }

}
