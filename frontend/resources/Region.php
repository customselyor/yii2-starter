<?php


namespace frontend\resources;


use common\models\Viloyat;
use common\models\ViloyatTranslation;

class Region extends Viloyat
{
    public function fields()
    {
        return ['id'];
    }

    public function extraFields()
    {
        return ['translate'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslate()
    {
        $request = \Yii::$app->request;

        if ($request->get() && array_key_exists('language', $request->get()) && ($request->get()['language'] == 'uz' || $request->get()['language'] == 'ru' || $request->get()['language'] == 'en' || $request->get()['language'] == 'oz')) {
            return $this->hasMany(ViloyatTranslation::class, ['viloyat_id' => 'id'])->lang($request->get()['language'])->select(['viloyat_id', 'language', 'title']);
        }

        return $this->hasMany(ViloyatTranslation::class, ['viloyat_id' => 'id'])->select(['viloyat_id', 'language',  'title']);
    }


}