<?php

namespace backend\controllers;

use common\models\Message;
use Yii;
use common\models\SourceMessage;
use backend\models\search\SourceMessageSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SourceMessageController implements the CRUD actions for SourceMessage model.
 */
class SourceMessageController extends Controller
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
     * Lists all SourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SourceMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SourceMessage model.
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
     * Creates a new SourceMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $count = 4;

        //Send at least one model to the form
        $messages = [new Message()];

        //Create an array of the products submitted
        for ($i = 1; $i < $count; $i++) {
            $messages[] = new Message();
        }

        $model = new SourceMessage();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $sourceMessageId = $model->getPrimaryKey();

            if (Model::loadMultiple($messages, Yii::$app->request->post()) && Model::validateMultiple($messages)) {
                foreach ($messages as $product) {
                    $product->id = $sourceMessageId;
                    $product->save(false);
                }
            }

            Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully saved'));

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'messages' => $messages,
        ]);
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $messages[0] = Message::find()->where(['id' => $model->id, 'language' => 'uz'])->one();
        $messages[1] = Message::find()->where(['id' => $model->id, 'language' => 'ru'])->one();
        $messages[2] = Message::find()->where(['id' => $model->id, 'language' => 'en'])->one();
        $messages[3] = Message::find()->where(['id' => $model->id, 'language' => 'oz'])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            foreach (Yii::$app->request->post()['Message'] as $k => $value) {

                $message = Message::find()->where(['id' => $model->id, 'language' => $value['language']])->one();
                $message->translation = $value['translation'];
                $message->save(false);
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully saved'));

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'messages' => $messages,
        ]);
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }

    /**
     * Deletes an existing SourceMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $messages = Message::find()->where(['id' => $id])->all();
        foreach ($messages as $key => $value) {
            Message::find()->where(['id' => $id])->one()->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SourceMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
