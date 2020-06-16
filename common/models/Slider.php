<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title
 * @property string $key
 * @property string $extra1
 * @property string $extra2
 * @property string $extra3
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SliderItems[] $sliderItems
 */
class Slider extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'key'], 'required'],
            [['extra1', 'extra2', 'extra3'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'key' => Yii::t('app', 'Key'),
            'extra1' => Yii::t('app', 'Extra1'),
            'extra2' => Yii::t('app', 'Extra2'),
            'extra3' => Yii::t('app', 'Extra3'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItems()
    {
        return $this->hasMany(SliderItems::className(), ['slider_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SliderQuery(get_called_class());
    }
}
