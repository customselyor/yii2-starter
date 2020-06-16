<?php

namespace common\models\query;

use omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Viloyat]].
 *
 * @see \common\models\Viloyat
 */
class ViloyatQuery extends MultilingualQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Viloyat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }



    /**
     * {@inheritdoc}
     * @return \common\models\Viloyat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
