<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slider}}`.
 */
class m190718_130125_create_slider_table extends Migration
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
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'key' => $this->string(255)->notNull(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%slider_items}}', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'image' => $this->string(255),
            'backgroun_image' => $this->string(255),
            'extra_image' => $this->string(255),
            'extra_1image' => $this->string(255),
            'extra_2image' => $this->string(255),
            'extra_3image' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%slider_items_translation}}', [
            'id' => $this->primaryKey(),
            'slider_items_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
            'slug' => $this->string(255),
            'body' => $this->text(),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_slider_items_translation_slider_items', '{{%slider_items_translation}}', 'slider_items_id', '{{%slider_items}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_slider_items_slider_id', '{{%slider_items}}', 'slider_id', '{{%slider}}', 'id', 'cascade', 'cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_slider_items_translation_slider_items', '{{%slider_items_translation}}');
        $this->dropForeignKey('fk_slider_items_slider_id', '{{%slider_items}}');

        $this->dropTable('{{%slider}}');
        $this->dropTable('{{%slider_items_translation}}');
        $this->dropTable('{{%slider_items}}');
    }
}
