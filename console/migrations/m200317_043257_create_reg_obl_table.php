<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reg_obl}}`.
 */
class m200317_043257_create_reg_obl_table extends Migration
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

        $this->createTable('{{%viloyat}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%viloyat_translation}}', [
            'id' => $this->primaryKey(),
            'viloyat_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
        ], $tableOptions);


        $this->createTable('{{%tuman}}', [
            'id' => $this->primaryKey(),
            'viloyat_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%tuman_translation}}', [
            'id' => $this->primaryKey(),
            'tuman_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
        ], $tableOptions);

        $this->addForeignKey('fk_viloyat_translation', '{{%viloyat_translation}}', 'viloyat_id', '{{%viloyat}}', 'id', 'cascade', 'cascade');

        $this->addForeignKey('fk_tuman_translation', '{{%tuman_translation}}', 'tuman_id', '{{%tuman}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_viloyat_tuman', '{{%tuman}}', 'viloyat_id', '{{%viloyat}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_viloyat_translation', '{{%viloyat_translation}}');
        $this->dropForeignKey('fk_tuman_translation', '{{%tuman_translation}}');
        $this->dropForeignKey('fk_viloyat_tuman', '{{%tuman}}');

        $this->dropTable('{{%viloyat}}');
        $this->dropTable('{{%viloyat_translation}}');

        $this->dropTable('{{%tuman}}');
        $this->dropTable('{{%tuman_translation}}');
    }
}
