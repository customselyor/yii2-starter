<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $lavozim_id
 * @property int|null $gender_id
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
 * @property int|null $child_id
 * @property int|null $published_at
 * @property int|null $author_id
 * @property int|null $updater_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $author
 * @property PostCategory $category
 * @property Gender $gender
 * @property Lavozim $lavozim
 * @property Posts $parent
 * @property Posts[] $posts
 * @property PostsTranslation[] $postsTranslations
 * @property User $updater
 */
class Posts extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;
    const ACADEMY_CATEGORY_ID = 23;
    const ACADEMY_ID = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'title_oz'], 'required'],
            [['title', 'title_ru', 'title_en', 'title_oz', 'slug', 'slug_ru', 'slug_en', 'slug_oz', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_title_oz', 'director', 'director_ru', 'director_en', 'director_oz', 'fio', 'fio_ru', 'fio_en', 'fio_oz'], 'string', 'max' => 255],
            ['published_at', 'default',
                'value' => function () {
                    return date("d-m-Y");
                }
            ],
            ['published_at', 'filter', 'filter' => 'strtotime'],
            [['category_id', 'lavozim_id', 'gender_id', 'status', 'is_favorite', 'year', 'month', 'day', 'age', 'passport_number', 'inn', 'sort_index', 'latitude', 'longitude', 'hits_count', 'parent_id', 'child_id', 'author_id', 'updater_id', 'created_at', 'updated_at', 'code', 'stir', 'gov_phone_number', 'work_phone_number', 'mobile_phone_number', 'home_phone_number', 'number_employees'], 'integer'],
            [['map'], 'string'],
            [['date_of_birth', 'fax', 'fax2', 'email', 'email2', 'phone', 'phone2', 'phone3', 'avatar', 'logo', 'icon', 'image', 'og_image', 'detail_image', 'urlcount'], 'string', 'max' => 255],
            [['passport_seria'], 'string', 'max' => 4],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => Posts::class],
            ['email', 'string', 'max' => 255],
            ['website', 'string', 'max' => 255],

            [['description', 'address', 'body', 'meta_description', 'description_ru', 'address_ru', 'body_ru', 'meta_description_ru', 'description_en', 'address_en', 'body_en', 'meta_description_en', 'description_oz', 'address_oz', 'body_oz', 'meta_description_oz'], 'string'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['child_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['child_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['lavozim_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lavozim::className(), 'targetAttribute' => ['lavozim_id' => 'id']],
            [['updater_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updater_id' => 'id']],
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
                    'logo' => [
                        'path' => '@storage/images/posts',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/posts'),
                    ],
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
                'langClassName' => PostsTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'posts_id',
                'tableName' => "{{%posts_translation}}",
                'attributes' => [
                    'title', 'slug', 'description', 'address', 'body', 'meta_title', 'meta_description', 'director', 'fio'
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
            'category_id' => Yii::t('app', 'Category Title'),
            'lavozim_id' => Yii::t('app', 'Lavozim'),
            'gender_id' => Yii::t('app', 'Gender'),
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
            'child_id' => Yii::t('app', 'Child Title'),
            'published_at' => Yii::t('app', 'Published At'),
            'author_id' => Yii::t('app', 'Author'),
            'updater_id' => Yii::t('app', 'Updater'),
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostCategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GenderQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Lavozim]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LavozimQuery
     */
    public function getLavozim()
    {
        return $this->hasOne(Lavozim::className(), ['id' => 'lavozim_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsQuery
     */
    public function getParent()
    {
        return $this->hasOne(Posts::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsQuery
     */
    public function getChild()
    {
        return $this->hasOne(Posts::className(), ['id' => 'child_id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[PostsTranslations]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostsTranslationQuery
     */
    public function getPostsTranslations()
    {
        return $this->hasMany(PostsTranslation::className(), ['posts_id' => 'id']);
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
     * @return \common\models\query\PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostsQuery(get_called_class());
    }
}
