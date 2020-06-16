<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lavozim".
 *
 * @property int $id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Lavozimlang[] $lavozimlangs
 */
class Lavozim extends \yii\db\ActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lavozim';
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
                'langClassName' => Lavozimlang::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'lavozim_id',
                'tableName' => "{{%doljnostlang}}",
                'attributes' => [
                    'title'
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
    public function getLavozimlangs()
    {
        return $this->hasMany(Lavozimlang::className(), ['lavozim_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LavozimQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LavozimQuery(get_called_class());
    }
}
