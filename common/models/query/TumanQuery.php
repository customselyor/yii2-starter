<?php

namespace common\models\query;

use omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Tuman]].
 *
 * @see \common\models\Tuman
 */
class TumanQuery extends MultilingualQuery
{

    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

//    public function custom()
//    {
//
//        return $this->joinWith('tumanTranslations');
////        return $this->joinWith(['tumanTranslations'=>function($q){
////            $q->from('{{%tuman_translation}} tr');
////        }]);
//    }

    /**
     * {@inheritdoc}
     * @return \common\models\Tuman[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Tuman|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
