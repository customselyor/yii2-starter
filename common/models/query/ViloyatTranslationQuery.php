<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ViloyatTranslation]].
 *
 * @see \common\models\ViloyatTranslation
 */
class ViloyatTranslationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ViloyatTranslation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    /**
     * {@inheritdoc}
     * @return \common\models\TumanTranslation[]|array
     */
    public function lang($lang = null)
    {
        return parent::where(['language'=>$lang]);
    }
    /**
     * {@inheritdoc}
     * @return \common\models\ViloyatTranslation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
