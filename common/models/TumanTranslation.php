<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tuman_translation".
 *
 * @property int $id
 * @property int $tuman_id
 * @property string $language
 * @property string $title
 *
 * @property Tuman $tuman
 */
class TumanTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tuman_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tuman_id'], 'integer'],
            [['language'], 'required'],
            [['language'], 'string', 'max' => 6],
            [['title'], 'string', 'max' => 255],
            [['tuman_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tuman::className(), 'targetAttribute' => ['tuman_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tuman_id' => Yii::t('app', 'Tuman ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuman()
    {
        return $this->hasOne(Tuman::className(), ['id' => 'tuman_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TumanTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TumanTranslationQuery(get_called_class());
    }
}
