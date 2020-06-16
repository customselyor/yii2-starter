<?php


namespace frontend\resources;


use common\models\Tuman;
use common\models\TumanTranslation;
use Yii;

class District extends Tuman
{
    public function fields()
    {
        return ['id', 'viloyat_id'];
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
        $request = Yii::$app->request;

        if ($request->get() && array_key_exists('language', $request->get()) && ($request->get()['language'] == 'uz' || $request->get()['language'] == 'ru' || $request->get()['language'] == 'en' || $request->get()['language'] == 'oz')) {
            return $this->hasMany(TumanTranslation::class, ['tuman_id' => 'id'])->lang($request->get()['language'])->select(['tuman_id', 'language', 'title']);
        }

        return $this->hasMany(TumanTranslation::class, ['tuman_id' => 'id'])->select(['tuman_id', 'language', 'title']);
    }

}