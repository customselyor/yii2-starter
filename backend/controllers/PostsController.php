<?php

namespace backend\controllers;

use common\models\Gender;
use common\models\Lavozim;
use common\models\PostCategory;
use Yii;
use common\models\Posts;
use backend\models\search\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, true);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
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
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => PostCategory::find()->active()->all(),
            'genders' => Gender::find()->active()->all(),
            'positions' => Lavozim::find()->active()->all(),
            'parents' => \common\models\Posts::find()->noParents()->active()->all(),
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => PostCategory::find()->active()->all(),
            'genders' => Gender::find()->active()->all(),
            'positions' => Lavozim::find()->active()->all(),
            'parents' => \common\models\Posts::find()->noParents()->active()->all(),
        ]);
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetdata($id)
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->get();
            $id = $data['id'];
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = Posts::findOne($id);


            if ($model) {
                $model_uz = Posts::find()->where(['id' => $id])->localized('uz')->active()->one();
                $model_ru = Posts::find()->where(['id' => $id])->localized('ru')->active()->one();
                $model_en = Posts::find()->where(['id' => $id])->localized('en')->active()->one();
                $model_oz = Posts::find()->where(['id' => $id])->localized('oz')->active()->one();


                $data = [
                    'titleuz' => $model_uz->title,
                    'sluguz' => $model_uz->slug,
                    'titleru' => $model_ru->title,
                    'slugru' => $model_ru->slug,
                    'titleen' => $model_en->title,
                    'slugen' => $model_en->slug,
                    'titleoz' => $model_oz->title,
                    'slugoz' => $model_oz->slug,
                ];

                return [
                    'status' => true,
                    'data' => $data,
                ];
            } else {
                return [
                    'status' => false,
                    'data' => null,
                ];
            }
        }
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::find()->multilingual()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
