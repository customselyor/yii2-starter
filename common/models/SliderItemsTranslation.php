<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider_items_translation".
 *
 * @property int $id
 * @property int $slider_items_id
 * @property string $language
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $meta_title
 * @property string $meta_description
 * @property string $extra1
 * @property string $extra2
 * @property string $extra3
 *
 * @property SliderItems $sliderItems
 */
class SliderItemsTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_items_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_items_id'], 'integer'],
            [['language'], 'required'],
            [['body', 'meta_description', 'extra1', 'extra2', 'extra3'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title', 'slug', 'meta_title'], 'string', 'max' => 255],
            [['slider_items_id'], 'exist', 'skipOnError' => true, 'targetClass' => SliderItems::className(), 'targetAttribute' => ['slider_items_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slider_items_id' => Yii::t('app', 'Slider Items ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'body' => Yii::t('app', 'Body'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'extra1' => Yii::t('app', 'Extra1'),
            'extra2' => Yii::t('app', 'Extra2'),
            'extra3' => Yii::t('app', 'Extra3'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItems()
    {
        return $this->hasOne(SliderItems::className(), ['id' => 'slider_items_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SliderItemsTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SliderItemsTranslationQuery(get_called_class());
    }
}
