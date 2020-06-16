<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "gender".
 *
 * @property int $id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property GenderTranslation[] $genderTranslations
 */
class Gender extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender';
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
                'langClassName' => GenderTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'gender_id',
                'tableName' => "{{%gender_translation}}",
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
    public function getGenderTranslations()
    {
        return $this->hasMany(GenderTranslation::className(), ['gender_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GenderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GenderQuery(get_called_class());
    }
}
