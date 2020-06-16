<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property int $status
 * @property string $email
 * @property string $phone
 * @property string $phone2
 * @property string $phone3
 * @property string $fax
 * @property string $fax2
 * @property string $fax3
 * @property string $map
 * @property string $image
 * @property string $og_image
 * @property string $detail_image
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ContactsTranslation[] $contactsTranslations
 */
class Contacts extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en'], 'required'],
            [['footer_menu', 'footer_menu_ru', 'footer_menu_en', 'footer_info', 'footer_info_ru', 'footer_info_en', 'contacts_info', 'contacts_info_ru', 'contacts_info_en', 'home_description', 'home_description_ru', 'home_description_en', 'address_locality', 'address_locality_ru',  'address_locality_en', 'street_address', 'street_address_ru', 'street_address_en', 'meta_description', 'meta_description_ru', 'meta_description_en'], 'string'],

            [['title', 'title_ru', 'legal_name', 'legal_name_ru', 'meta_title', 'meta_title_ru'], 'string', 'max' => 255],


            [['status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'phone'], 'required'],
            ['email', 'email'],
            [['phone', 'phone2', 'fax', 'fax2'], 'match', 'pattern' => '/^\+\d{5} \d{3}-\d{2}-\d{2}$/'],
            [['map'], 'string'],
            [['email', 'image', 'og_image', 'detail_image'], 'string', 'max' => 255],
            [['phone', 'phone2', 'phone3', 'fax', 'fax2', 'fax3'], 'string', 'max' => 50],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@storage/images',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images'),
                    ],
                    'og_image' => [
                        'path' => '@storage/images',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images'),
                    ],
                    'detail_image' => [
                        'path' => '@storage/images',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images'),
                    ],
                ],
            ],
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
                'langClassName' => ContactsTranslation::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'uz',
                'langForeignKey' => 'contacts_id',
                'tableName' => "{{%contacts_translation}}",
                'attributes' => [
                    'title', 'footer_menu', 'footer_info', 'contacts_info', 'home_description', 'address_locality', 'street_address', 'meta_description', 'legal_name', 'meta_title'
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
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'phone2' => Yii::t('app', 'Phone2'),
            'phone3' => Yii::t('app', 'Phone3'),
            'fax' => Yii::t('app', 'Fax'),
            'fax2' => Yii::t('app', 'Fax2'),
            'fax3' => Yii::t('app', 'Fax3'),
            'map' => Yii::t('app', 'Map'),
            'image' => Yii::t('app', 'Image'),
            'og_image' => Yii::t('app', 'Og Image'),
            'detail_image' => Yii::t('app', 'Detail Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactsTranslations()
    {
        return $this->hasMany(ContactsTranslation::className(), ['contacts_id' => 'id']);
    }

    public static function getData($id = 1){

        $contacts = self::find()->localized(Yii::$app->language)->cache(3000)->andWhere(['id' => $id])->one();
//        // try retrieving $data from cache
//        $contacts = $cache->get($id);
//
//        if ($contacts === false) {
//            $contacts = self::find()->localized(Yii::$app->language)->cache(3000)->andWhere(['id' => $id])->one();
//
//            // store $data in cache so that it can be retrieved next time
//            $cache->set($id, $contacts);
//        }
        return $contacts;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContactsQuery(get_called_class());
    }
}
