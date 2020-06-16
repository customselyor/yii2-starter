<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%posts}}`.
 */
class m200522_023449_add_new_column_to_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'code', $this->integer());
        $this->addColumn('posts', 'stir', $this->integer());
        $this->addColumn('posts', 'gov_phone_number', $this->integer());
        $this->addColumn('posts', 'work_phone_number', $this->integer());
        $this->addColumn('posts', 'mobile_phone_number', $this->integer());
        $this->addColumn('posts', 'home_phone_number', $this->integer());
        $this->addColumn('posts', 'website', $this->string(255));
        $this->addColumn('posts', 'number_employees', $this->integer());
        $this->addColumn('posts_translation', 'director', $this->string(255));
        $this->addColumn('posts_translation', 'fio', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('posts', 'code');
        $this->dropColumn('posts', 'stir');
        $this->dropColumn('posts', 'gov_phone_number');
        $this->dropColumn('posts', 'work_phone_number');
        $this->dropColumn('posts', 'mobile_phone_number');
        $this->dropColumn('posts', 'home_phone_number');
        $this->dropColumn('posts', 'number_employees');
        $this->dropColumn('posts', 'website');
        $this->dropColumn('posts_translation', 'director');
        $this->dropColumn('posts_translation', 'fio');

    }
}
