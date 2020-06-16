<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts_translation".
 *
 * @property int $id
 * @property int $contacts_id
 * @property string $language
 * @property string $title
 * @property string $site_name
 * @property string $site_name2
 * @property string $footer_menu
 * @property string $footer_info
 * @property string $contacts_info
 * @property string $home_description
 * @property string $footer_description
 * @property string $address_locality
 * @property string $street_address
 * @property string $street_address2
 * @property string $legal_name
 * @property string $meta_title
 * @property string $meta_description
 * @property string $extra1
 * @property string $extra2
 * @property string $extra3
 *
 * @property Contacts $contacts
 */
class ContactsTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contacts_id'], 'integer'],
            [['language', 'title'], 'required'],
            [['site_name', 'site_name2', 'footer_menu', 'footer_info', 'contacts_info', 'home_description', 'footer_description', 'address_locality', 'street_address', 'street_address2', 'meta_description', 'extra1', 'extra2', 'extra3'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title', 'legal_name', 'meta_title'], 'string', 'max' => 255],
            [['contacts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contacts_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contacts_id' => Yii::t('app', 'Contacts ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'site_name' => Yii::t('app', 'Site Name'),
            'site_name2' => Yii::t('app', 'Site Name2'),
            'footer_menu' => Yii::t('app', 'Footer Menu'),
            'footer_info' => Yii::t('app', 'Footer Info'),
            'contacts_info' => Yii::t('app', 'Contacts Info'),
            'home_description' => Yii::t('app', 'Home Description'),
            'footer_description' => Yii::t('app', 'Footer Description'),
            'address_locality' => Yii::t('app', 'Address Locality'),
            'street_address' => Yii::t('app', 'Street Address'),
            'street_address2' => Yii::t('app', 'Street Address2'),
            'legal_name' => Yii::t('app', 'Legal Name'),
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
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ContactsTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContactsTranslationQuery(get_called_class());
    }
}
