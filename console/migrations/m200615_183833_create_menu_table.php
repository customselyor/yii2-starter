<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m200615_183833_create_menu_table extends Migration
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

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'key' => $this->string(255)->notNull(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%menu_items}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(),
            'parent_id' => $this->integer(),
            'target' => $this->string(255),
            'ico_path' => $this->string(255),
            'title' => $this->string(255),
            'body' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('fk_menu_items_menu_id', '{{%menu_items}}', 'menu_id', '{{%menu}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_menu_items_menu_id', '{{%menu_items}}');
        $this->dropTable('{{%menu}}');
        $this->dropTable('{{%menu_items}}');
    }
}
