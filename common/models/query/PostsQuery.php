<?php

namespace common\models\query;

use omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Posts]].
 *
 * @see \common\models\Posts
 */
class PostsQuery extends MultilingualQuery
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
        $this->andWhere('{{%posts}}.parent_id IS NULL');

        return $this;
    }

    /**
     * @return $this
     */
    public function slug($slug)
    {
        return $this->joinWith(['postsTranslations'])
            ->andWhere(['slug' => $slug]);
    }


    /**
     * {@inheritdoc}
     * @return \common\models\Posts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Posts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
