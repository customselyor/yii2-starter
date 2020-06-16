<?php

namespace common\models\query;
use \omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\SliderItems]].
 *
 * @see \common\models\SliderItems
 */
class SliderItemsQuery extends MultilingualQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \common\models\SliderItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\SliderItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
