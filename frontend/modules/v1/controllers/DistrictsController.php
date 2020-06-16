<?php

namespace frontend\modules\v1\controllers;


use frontend\resources\District;
use frontend\resources\Region;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class DistrictsController extends V1BaseController
{
    public $modelClass = District::class;

    public function prepareDataProvider()
    {
        $request = Yii::$app->request;

        $query = $this->modelClass::find()->active();
        if ($request->get() && array_key_exists('viloyat_id', $request->get())) {
            $query = $this->modelClass::find()->where(['viloyat_id' => $request->get()['viloyat_id']])->active();
        }
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
