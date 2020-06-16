<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "viloyat_translation".
 *
 * @property int $id
 * @property int $viloyat_id
 * @property string $language
 * @property string $title
 *
 * @property Viloyat $viloyat
 */
class ViloyatTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viloyat_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['viloyat_id'], 'integer'],
            [['language'], 'required'],
            [['language'], 'string', 'max' => 6],
            [['title'], 'string', 'max' => 255],
            [['viloyat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viloyat::className(), 'targetAttribute' => ['viloyat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'viloyat_id' => Yii::t('app', 'Viloyat ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
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
     * {@inheritdoc}
     * @return \common\models\query\ViloyatTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ViloyatTranslationQuery(get_called_class());
    }
}
