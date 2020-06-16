<?php

namespace common\models\query;

use omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\PostCategory]].
 *
 * @see \common\models\PostCategory
 */
class PostCategoryQuery extends  MultilingualQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }
    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('{{%post_category}}.parent_id IS NULL');

        return $this;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\PostCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\PostCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
