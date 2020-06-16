<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gender}}`.
 */
class m200317_065623_create_gender_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gender}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%gender_translation}}', [
            'id' => $this->primaryKey(),
            'gender_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
        ], $tableOptions);

        $this->addForeignKey('fk_gender_translation', '{{%gender_translation}}', 'gender_id', '{{%gender}}', 'id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_gender_translation', '{{%gender_translation}}');

        $this->dropTable('{{%gender}}');
        $this->dropTable('{{%gender_translation}}');
    }
}
