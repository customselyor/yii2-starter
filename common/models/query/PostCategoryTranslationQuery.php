<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\PostCategoryTranslation]].
 *
 * @see \common\models\PostCategoryTranslation
 */
class PostCategoryTranslationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\PostCategoryTranslation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\PostCategoryTranslation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
