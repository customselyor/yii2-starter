<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tuman".
 *
 * @property int $id
 * @property int $viloyat_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Viloyat $viloyat
 * @property TumanTranslation[] $tumanTranslations
 */
class Tuman extends \yii\db\ActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tuman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'title_oz', 'viloyat_id'], 'required'],
            [['title', 'title_ru', 'title_en', 'title_oz'], 'string', 'max' => 255],
            [['viloyat_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['viloyat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viloyat::className(), 'targetAttribute' => ['viloyat_id' => 'id']],
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
                'langClassName' => TumanTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'tuman_id',
                'tableName' => "{{%tuman_translation}}",
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
            'viloyat_id' => Yii::t('app', 'Viloyats'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViloyat()
    {
        return $this->hasOne(Viloyat::className(), ['id' => 'viloyat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTumanTranslations()
    {
        return $this->hasMany(TumanTranslation::className(), ['tuman_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TumanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TumanQuery(get_called_class());
    }
}
