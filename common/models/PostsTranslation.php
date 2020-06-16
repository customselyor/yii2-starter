<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "posts_translation".
 *
 * @property int $id
 * @property int|null $posts_id
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
 * @property Posts $posts
 */
class PostsTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posts_id'], 'integer'],
            [['language'], 'required'],
            [['description', 'address', 'address2', 'address3', 'body', 'meta_description', 'extra1', 'extra2', 'extra3'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title', 'slug', 'meta_title', 'director', 'fio'], 'string', 'max' => 255],
            [['posts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['posts_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'posts_id' => Yii::t('app', 'Posts ID'),
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
    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsQuery
     */
    public function getPosts()
    {
        return $this->hasOne(Posts::className(), ['id' => 'posts_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PostsTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostsTranslationQuery(get_called_class());
    }
}
