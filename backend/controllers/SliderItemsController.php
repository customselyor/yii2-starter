<?php

namespace backend\controllers;

use common\models\Slider;
use Yii;
use common\models\SliderItems;
use backend\models\search\SliderItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SliderItemsController implements the CRUD actions for SliderItems model.
 */
class SliderItemsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SliderItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SliderItems model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SliderItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new SliderItems();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
    public function actionCreate($slider_id)
    {
        $model = new SliderItems();
        $slider = Slider::findOne($slider_id);

        if (!$slider) {
            throw new HttpException(400);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {

                Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully saved'));

                return $this->redirect(['/slider/update', 'id' => $model->slider_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'slider' => $slider,
            'slider_id' => $slider_id,
        ]);
    }

    /**
     * Updates an existing SliderItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $slider = Slider::findOne($model->slider_id);

        if (!$slider) {
            throw new HttpException(400);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {

                Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully saved'));

                return $this->redirect(['/slider/update', 'id' => $model->slider_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'slider' => $slider,
            'slider_id' => $model->slider_id,
        ]);

    }

    /**
     * Deletes an existing SliderItems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model =$this->findModel($id);
        $slider_id = $model->slider_id;
        $model->delete();
        Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully deleted'));
        return $this->redirect(['/slider/update', 'id' => $slider_id]);
    }

    /**
     * Finds the SliderItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SliderItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SliderItems::find()->multilingual()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
