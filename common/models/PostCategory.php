<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Query;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property string $key
 * @property int|null $status
 * @property int|null $is_favorite
 * @property string|null $date_of_birth
 * @property int|null $year
 * @property int|null $month
 * @property int|null $day
 * @property int|null $age
 * @property string|null $fax
 * @property string|null $fax2
 * @property string|null $email
 * @property string|null $email2
 * @property string|null $phone
 * @property string|null $phone2
 * @property string|null $phone3
 * @property string|null $passport_seria
 * @property int|null $passport_number
 * @property int|null $inn
 * @property string|null $avatar
 * @property string|null $logo
 * @property string|null $icon
 * @property string|null $image
 * @property string|null $og_image
 * @property string|null $detail_image
 * @property int|null $sort_index
 * @property string|null $urlcount
 * @property string|null $map
 * @property int|null $latitude
 * @property int|null $longitude
 * @property int|null $hits_count
 * @property int|null $parent_id
 * @property int|null $published_at
 * @property int|null $author_id
 * @property int|null $updater_id
 * @property string|null $extra1
 * @property string|null $extra2
 * @property string|null $extra3
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $author
 * @property PostCategory $parent
 * @property PostCategory[] $postCategories
 * @property PostCategoryTranslation[] $postCategoryTranslations
 * @property Posts[] $posts
 * @property User $updater
 */
class PostCategory extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['title', 'title_ru', 'title_en', 'title_oz'], 'required'],
            [['title', 'title_ru', 'title_en', 'title_oz', 'slug', 'slug_ru', 'slug_en', 'slug_oz', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_title_oz'], 'string', 'max' => 255],
            ['published_at', 'default',
                'value' => function () {
                    return date("d-m-Y");
                }
            ],
            ['published_at', 'filter', 'filter' => 'strtotime'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['status', 'is_favorite', 'year', 'month', 'day', 'age', 'passport_number', 'inn', 'sort_index', 'latitude', 'longitude', 'hits_count', 'parent_id', 'author_id', 'updater_id', 'created_at', 'updated_at'], 'integer'],
            [['map', 'extra1', 'extra2', 'extra3'], 'string'],
            [['key', 'date_of_birth', 'fax', 'fax2', 'email', 'email2', 'phone', 'phone2', 'phone3', 'avatar', 'logo', 'icon', 'image', 'og_image', 'detail_image', 'urlcount'], 'string', 'max' => 255],
            [['passport_seria'], 'string', 'max' => 4],
            [['updater_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updater_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'updater_id',
            ],
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@storage/images/posts',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/posts'),
                    ],
                    'og_image' => [
                        'path' => '@storage/images/posts',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/posts'),
                    ],
                    'detail_image' => [
                        'path' => '@storage/images/posts',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/posts'),
                    ],
                ],
            ],
            TimestampBehavior::class,
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'O\'zbekcha',
                    'oz' => 'Ўзбекча',
                    'ru' => 'Russian',
                    'en' => 'English',
                ],
                'languageField' => 'language',
                'localizedPrefix' => '',
                'requireTranslations' => false,
                'dynamicLangClass' => true,
                'langClassName' => PostCategoryTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'post_category_id',
                'tableName' => "{{%post_category_translation}}",
                'attributes' => [
                    'title', 'slug', 'description', 'address', 'body', 'meta_title', 'meta_description'
                ]
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'status' => Yii::t('app', 'Status'),
            'is_favorite' => Yii::t('app', 'Is Favorite'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
            'day' => Yii::t('app', 'Day'),
            'age' => Yii::t('app', 'Age'),
            'fax' => Yii::t('app', 'Fax'),
            'fax2' => Yii::t('app', 'Fax2'),
            'email' => Yii::t('app', 'Email'),
            'email2' => Yii::t('app', 'Email2'),
            'phone' => Yii::t('app', 'Phone'),
            'phone2' => Yii::t('app', 'Phone2'),
            'phone3' => Yii::t('app', 'Phone3'),
            'passport_seria' => Yii::t('app', 'Passport Seria'),
            'passport_number' => Yii::t('app', 'Passport Number'),
            'inn' => Yii::t('app', 'Inn'),
            'avatar' => Yii::t('app', 'Avatar'),
            'logo' => Yii::t('app', 'Logo'),
            'icon' => Yii::t('app', 'Icon'),
            'image' => Yii::t('app', 'Image'),
            'og_image' => Yii::t('app', 'Og Image'),
            'detail_image' => Yii::t('app', 'Detail Image'),
            'sort_index' => Yii::t('app', 'Sort Index'),
            'urlcount' => Yii::t('app', 'Urlcount'),
            'map' => Yii::t('app', 'Map'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'hits_count' => Yii::t('app', 'Hits Count'),
            'parent_id' => Yii::t('app', 'Parent Title'),
            'published_at' => Yii::t('app', 'Published At'),
            'author_id' => Yii::t('app', 'Author ID'),
            'updater_id' => Yii::t('app', 'Updater ID'),
            'extra1' => Yii::t('app', 'Extra1'),
            'extra2' => Yii::t('app', 'Extra2'),
            'extra3' => Yii::t('app', 'Extra3'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostCategoryQuery
     */
    public function getParent()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[PostCategories]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostCategoryQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[PostCategoryTranslations]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostCategoryTranslationQuery
     */
    public function getPostCategoryTranslations()
    {
        return $this->hasMany(PostCategoryTranslation::className(), ['post_category_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Updater]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PostCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostCategoryQuery(get_called_class());
    }
}
