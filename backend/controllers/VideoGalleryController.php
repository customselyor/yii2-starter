<?php

namespace backend\controllers;

use common\models\PostCategory;
use Yii;
use common\models\Post;
use backend\models\search\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class VideoGalleryController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, [8]);

        $dataProvider->sort = [
            'defaultOrder' => ['updated_at' => SORT_DESC],
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => PostCategory::find()->localized(Yii::$app->language)->active()->all(),
        ]);
    }

    /**
     * Updates an existing Post model.
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
            'categories' => PostCategory::find()->localized(Yii::$app->language)->active()->all(),
        ]);
    }

    /**
     * Deletes an existing Post model.
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

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
//    protected function findModel($id)
//    {
//        if (($model = Post::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
//    }

    protected function findModel($id)
    {
        if (($model = Post::find()->multilingual()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionGetdata($id)
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->get();
            $id = $data['id'];
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = Post::findOne($id);


            if ($model) {
                $model_uz = Post::find()->where(['id'=>$id])->localized('uz')->active()->one();
                $model_ru = Post::find()->where(['id'=>$id])->localized('ru')->active()->one();
                $model_en = Post::find()->where(['id'=>$id])->localized('en')->active()->one();
                $post_categories_uz = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('uz')->active()->one();
                $post_categories_ru = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('ru')->active()->one();
                $post_categories_en = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('en')->active()->one();
                $post_categories = PostCategory::find()->where(['id'=>$model->post_category_id])->active()->one();

                if ($post_categories){
                    $data = [
                        'titleuz' => $model_uz->title,
                        'sluguz' => $post_categories_uz->slug.'/'.$model_uz->slug,
                        'titleru' => $model_ru->title,
                        'slugru' => $post_categories_ru->slug.'/'.$model_ru->slug,
                        'titleen' => $model_en->title,
                        'slugen' => $post_categories_en->slug.'/'.$model_en->slug,
                    ];
                }else{
                    $data = [
                        'titleuz' => $model_uz->title,
                        'sluguz' => 'page/'.$model_uz->slug,
                        'titleru' => $model_ru->title,
                        'slugru' => 'page/'.$model_ru->slug,
                        'titleen' => $model_en->title,
                        'slugen' => 'page/'.$model_en->slug,
                    ];
                }

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

    public function actionGetdatacat($id)
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->get();
            $id = $data['id'];
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = PostCategory::findOne($id);
            if ($model) {
                $post_categories = null;
                $model_uz = PostCategory::find()->where(['id'=>$id])->localized('uz')->active()->one();
                $model_ru = PostCategory::find()->where(['id'=>$id])->localized('ru')->active()->one();
                $model_en = PostCategory::find()->where(['id'=>$id])->localized('en')->active()->one();
//                $post_categories_uz = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('uz')->active()->one();
//                $post_categories_ru = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('ru')->active()->one();
//                $post_categories_en = PostCategory::find()->where(['id'=>$model->post_category_id])->localized('en')->active()->one();
//                $post_categories = PostCategory::find()->where(['id'=>$model->post_category_id])->active()->one();

                if ($post_categories){
                    $data = [
                        'titleuz' => $model_uz->title,
                        'sluguz' => $post_categories_uz->slug.'/'.$model_uz->slug,
                        'titleru' => $model_ru->title,
                        'slugru' => $post_categories_ru->slug.'/'.$model_ru->slug,
                        'titleen' => $model_en->title,
                        'slugen' => $post_categories_en->slug.'/'.$model_en->slug,
                    ];
                }else{
                    $data = [
                        'titleuz' => $model_uz->title,
                        'sluguz' => $model_uz->slug,
                        'titleru' => $model_ru->title,
                        'slugru' => $model_ru->slug,
                        'titleen' => $model_en->title,
                        'slugen' => $model_en->slug,
                    ];
                }

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

    public function actionSubcat()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = self::getProdList($cat_id);

                foreach ($data as $k => $v) {
                    $data[$k] = [
                        'id' => $v->id,
                        'name' => $v->title,
                    ];
                }
                /**
                 * the getProdList function will query the database based on the
                 * cat_id and sub_cat_id and return an array like below:
                 *  [
                 *      'out'=>[
                 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
                 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
                 *       ],
                 *       'selected'=>'<prod-id-1>'
                 *  ]
                 */

//                return ['output'=>$data['out'], 'selected'=>$data['selected']];
                return ['output' => $data, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    private static function getProdList($cat_id)
    {
        $regions = Post::find()->select(['post.id as id', 'et.title as name'])->joinWith(['postTranslations' => function ($q) {
            $q->from('{{%post_translation}} et');
        }])->where(['post.post_category_id' => $cat_id])->localized(Yii::$app->language)->all();

        return $regions;
    }


}
