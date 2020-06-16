<?php

namespace frontend\controllers;

use common\models\PostCategory;
use common\models\Posts;
use common\models\PostsTranslation;
use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use yii\web\NotFoundHttpException;

/**
 * Class SiteController.
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
            'fileapi-upload' => [
                'class' => FileAPIUpload::class,
                'path' => '@storage/tmp',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($slug = null)
    {
        $model = Posts::find()->slug($slug)->active()->localized(Yii::$app->language)->one();

//        $model = PostsTranslation::find()->where(['slug' => $slug, 'language' => Yii::$app->language])->one();

        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'Page not found.'));
        }
        // meta description
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => $model->description,
        ]);

        return $this->render('view', [
            'model' => $model,
            'menuItems' => self::getMenuItems(),
        ]);

    }
    /**
     * Generate menu items for yii\widgets\Menu
     *
     * @param null|array $models
     * @return array
     */
    public static function getMenuItems(array $models = null)
    {
        $items = [];
        if ($models === null) {
            $models = PostCategory::find()->where(['parent_id' => null])->with('posts')->orderBy(['id' => SORT_ASC])->active()->all();
        }
        foreach ($models as $model) {
            $items[] = [
                'url' => ['/category', 'slug' => $model->slug],
                'label' => $model->title,
                'items' => self::getMenuItems($model->posts),
            ];
        }

        return $items;
    }
}
