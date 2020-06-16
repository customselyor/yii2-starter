<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "viloyat".
 *
 * @property int $id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Tuman[] $tuman
 * @property ViloyatTranslation[] $viloyatTranslations
 */
class Viloyat extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viloyat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'title_oz'], 'required'],
            [['title', 'title_ru', 'title_en', 'title_oz'], 'string', 'max'=>255],
            [['status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
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
                'langClassName' => ViloyatTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'viloyat_id',
                'tableName' => "{{%viloyat_translation}}",
                'attributes' => [
                    'title',
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuman()
    {
        return $this->hasMany(Tuman::className(), ['viloyat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViloyatTranslations()
    {
        return $this->hasMany(ViloyatTranslation::className(), ['viloyat_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ViloyatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ViloyatQuery(get_called_class());
    }
}
