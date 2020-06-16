<?php

namespace common\models\query;

use omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Lavozim]].
 *
 * @see \common\models\Lavozim
 */
class LavozimQuery extends MultilingualQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Lavozim[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Lavozim|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
