<?php

namespace common\models\query;
use \omgdef\multilingual\MultilingualQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Contacts]].
 *
 * @see \common\models\Contacts
 */
class ContactsQuery extends MultilingualQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Contacts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Contacts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
