<?php


namespace frontend\resources;


use common\models\Lavozim;
use common\models\Lavozimlang;

class Position extends Lavozim
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
            return $this->hasMany(Lavozimlang::class, ['lavozim_id' => 'id'])->lang($request->get()['language'])->select(['lavozim_id', 'language', 'title']);
        }

        return $this->hasMany(Lavozimlang::class, ['lavozim_id' => 'id'])->select(['lavozim_id', 'language', 'title']);
    }
}