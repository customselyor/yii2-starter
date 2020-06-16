<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\Query;

/**
 * This is the model class for table "post_category_translation".
 *
 * @property int $id
 * @property int|null $post_category_id
 * @property string $language
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $address
 * @property string|null $address2
 * @property string|null $address3
 * @property string|null $body
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $extra1
 * @property string|null $extra2
 * @property string|null $extra3
 *
 * @property PostCategory $postCategory
 */
class PostCategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_category_id'], 'integer'],
            [['language'], 'required'],
            [['description', 'address', 'address2', 'address3', 'body', 'meta_description', 'extra1', 'extra2', 'extra3'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title', 'slug', 'meta_title'], 'string', 'max' => 255],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['post_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'ensureUnique' => true,
                'immutable' => true,
            ],
        ];
    }

//    public function beforeSave($insert)
//    {
//
//        if (!parent::beforeSave($insert)) {
//
//            return false;
//
//        }
//
//        if ($insert) {
//            $post = PostsTranslation::find()->where(['like', 'slug', $this->slug])->orderBy(['slug' => SORT_DESC])->one();
//
//            if ($post) {
//                $gen_slug = $this->slug;
//                $last = substr($post->slug, -1);
//                if (is_numeric($last)) {
//                    $last++;
//                    $gen_slug = $this->slug . '-' . $last;
//                } else {
//                    $gen_slug = $this->slug . '-2';
//                }
//                $this->slug = $gen_slug;
//            }
//
//
//        }
//
//        return parent::beforeSave($insert);
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_category_id' => Yii::t('app', 'Post Category ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'address3' => Yii::t('app', 'Address3'),
            'body' => Yii::t('app', 'Body'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'extra1' => Yii::t('app', 'Extra1'),
            'extra2' => Yii::t('app', 'Extra2'),
            'extra3' => Yii::t('app', 'Extra3'),
        ];
    }

    /**
     * Gets query for [[PostCategory]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostCategoryQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'post_category_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PostCategoryTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostCategoryTranslationQuery(get_called_class());
    }
}
