<?php

namespace frontend\modules\v1\controllers;


use common\models\ViloyatTranslation;
use frontend\resources\Region;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class RegionsController extends V1BaseController
{
    public $modelClass = Region::class;


    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $request = Yii::$app->request;
        $query = $this->modelClass::find()->active();

//        if ($request->get() && array_key_exists('language', $request->get()) && ($request->get()['language'] == 'uz' || $request->get()['language'] == 'ru' || $request->get()['language'] == 'en' || $request->get()['language'] == 'oz')) {
//            $query = $this->modelClass::find()->where(['language' => $request->get()['language']]);
//        }

        $provider = new ActiveDataProvider([
            'query' => $query,
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'title' => SORT_ASC,
//                ]
//            ],
        ]);

        return $provider;
    }



}
