<?php

namespace backend\controllers;

use Yii;
use common\models\MenuItems;
use backend\models\search\MenuItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuItemsController implements the CRUD actions for MenuItems model.
 */
class MenuItemsController extends Controller
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
     * Lists all MenuItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MenuItems model.
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
     * Creates a new MenuItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MenuItems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MenuItems model.
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
        ]);
    }

    /**
     * Deletes an existing MenuItems model.
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
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionAddmenus()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        if ($postdata = Yii::$app->request->post()) {
            $menu_id = isset($postdata['id']) ? $postdata['id'] : null;
            $menu_data = isset($postdata['menus']) ? serialize(json_decode($postdata['menus'])) : null;
            $model = MenuItems::find()->where(['menu_id'=>$menu_id])->one();
            if ($model) {
                $model->menu_id = $menu_id;
                $model->body= $menu_data;
                $model->save(false);
            } else {
                $model = new MenuItems();
                $model->menu_id = $menu_id;
                $model->body = $menu_data;
                $model->save(false);
            }
            return ['status' => true, 'data' => $model];


        } else {
            throw new NotFoundHttpException(Yii::t('frontend', 'Page not found.'));
        }
    }
    public function actionGetmenus()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            $menu_id = $id = isset($get['id']) ? $get['id'] : null;
            if (isset($menu_id) && $menu_id > 0) {
                $menu_item = MenuItems::find()->where(['menu_id' => $menu_id])->one();
                if ($menu_item) {
                    return ['status' => true, 'data' => unserialize($menu_item->body)];
                } else {
                    return ['status' => false, 'data' => 0];
                }
            } else {
                return ['status' => false, 'data' => 'Not found'];
            }
        } else {
            throw new NotFoundHttpException(Yii::t('frontend', 'Page not found.'));
        }
    }
    /**
     * Finds the MenuItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MenuItems::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
