<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "menu_items".
 *
 * @property int $id
 * @property int $menu_id
 * @property int $parent_id
 * @property string $target
 * @property string $ico_path
 * @property string $title
 * @property string $slug
 * @property string $title_ru
 * @property string $slug_ru
 * @property string $title_en
 * @property string $slug_en
 * @property string $body
 * @property string $body_ru
 * @property string $body_en
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Menu $menu
 */
class MenuItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['body', 'body_ru', 'body_en'], 'string'],
            [['target', 'ico_path', 'title', 'slug', 'title_ru', 'slug_ru', 'title_en', 'slug_en'], 'string', 'max' => 255],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

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
            'menu_id' => Yii::t('app', 'Menu ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'target' => Yii::t('app', 'Target'),
            'ico_path' => Yii::t('app', 'Ico Path'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'slug_ru' => Yii::t('app', 'Slug Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'slug_en' => Yii::t('app', 'Slug En'),
            'body' => Yii::t('app', 'Body'),
            'body_ru' => Yii::t('app', 'Body Ru'),
            'body_en' => Yii::t('app', 'Body En'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MenuItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MenuItemsQuery(get_called_class());
    }
}
