<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gender_translation".
 *
 * @property int $id
 * @property int $gender_id
 * @property string $language
 * @property string $title
 *
 * @property Gender $gender
 */
class GenderTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id'], 'integer'],
            [['language'], 'required'],
            [['language'], 'string', 'max' => 6],
            [['title'], 'string', 'max' => 255],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GenderTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GenderTranslationQuery(get_called_class());
    }
}
