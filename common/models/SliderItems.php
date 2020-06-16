<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "slider_items".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $image
 * @property int $status
 * @property string $backgroun_image
 * @property string $extra_image
 * @property string $extra_1image
 * @property string $extra_2image
 * @property string $extra_3image
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Slider $slider
 * @property SliderItemsTranslation[] $sliderItemsTranslations
 */
class SliderItems extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'slug', 'slug_ru', 'slug_en'], 'string', 'max'=>255],
            [['body', 'body_ru', 'body_en', 'meta_description', 'meta_description_ru', 'meta_description_en'], 'string'],
            [['status', 'slider_id', 'created_at', 'updated_at'], 'integer'],
            [['image', 'backgroun_image', 'extra_image', 'extra_1image', 'extra_2image', 'extra_3image'], 'string', 'max' => 255],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@storage/images/slider',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/slider'),
                    ],
                    'backgroun_image' => [
                        'path' => '@storage/images/widgets',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/slider'),
                    ],
                ],
            ],
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
                'langClassName' => SliderItemsTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'slider_items_id',
                'tableName' => "{{%slider_items_translation}}",
                'attributes' => [
                    'title', 'body', 'slug', 'meta_description'
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
            'slider_id' => Yii::t('app', 'Sliders'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'backgroun_image' => Yii::t('app', 'Backgroun Image'),
            'extra_image' => Yii::t('app', 'Extra Image'),
            'extra_1image' => Yii::t('app', 'Extra 1image'),
            'extra_2image' => Yii::t('app', 'Extra 2image'),
            'extra_3image' => Yii::t('app', 'Extra 3image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::className(), ['id' => 'slider_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItemsTranslations()
    {
        return $this->hasMany(SliderItemsTranslation::className(), ['slider_items_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SliderItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SliderItemsQuery(get_called_class());
    }
}
