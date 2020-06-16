<?php

namespace frontend\modules\v1\controllers;

use frontend\resources\Position;
use frontend\resources\Region;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class PositionsController extends V1BaseController
{
    public $modelClass = Position::class;

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
        if ($request->get() && array_key_exists('viloyat_id', $request->get())) {
            $query = $this->modelClass::find()->where(['viloyat_id'=>$request->get()['viloyat_id']])->active();
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
