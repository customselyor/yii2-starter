<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lavozimlang".
 *
 * @property int $id
 * @property int $lavozim_id
 * @property string $language
 * @property string $title
 * @property string $extra1
 * @property string $extra2
 * @property string $extra3
 *
 * @property Lavozim $lavozim
 */
class Lavozimlang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lavozimlang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lavozim_id'], 'integer'],
            [['language', 'title'], 'required'],
            [['extra1', 'extra2', 'extra3'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title'], 'string', 'max' => 255],
            [['lavozim_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lavozim::className(), 'targetAttribute' => ['lavozim_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lavozim_id' => Yii::t('app', 'Lavozim ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'extra1' => Yii::t('app', 'Extra1'),
            'extra2' => Yii::t('app', 'Extra2'),
            'extra3' => Yii::t('app', 'Extra3'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLavozim()
    {
        return $this->hasOne(Lavozim::className(), ['id' => 'lavozim_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LavozimlangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LavozimlangQuery(get_called_class());
    }
}
