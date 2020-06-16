<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%widgets_text}}`.
 */
class m190720_121450_create_widgets_text_table extends Migration
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

        $this->createTable('{{%widgets_text}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'key' => $this->string(255)->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'sort_index' => $this->integer(),
            'urlcount' => $this->string(255)->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%widget_text_translation}}', [
            'id' => $this->primaryKey(),
            'widget_text_id' => $this->integer(),
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

        $this->addForeignKey('fk_widget_text_translation_slider_items', '{{%widget_text_translation}}', 'widget_text_id', '{{%widgets_text}}', 'id', 'cascade', 'cascade');

        $this->createTable('{{%widget_items}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255),
            'parent_id' => $this->integer(),
            'widgets_text_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'sort_index' => $this->integer(),
            'urlcount' => $this->string(255)->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%widget_items_translation}}', [
            'id' => $this->primaryKey(),
            'widget_items_id' => $this->integer(),
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


        $this->addForeignKey('fk_widget_items_translation_slider_items', '{{%widget_items_translation}}', 'widget_items_id', '{{%widget_items}}', 'id', 'cascade', 'cascade');

        $this->addForeignKey('fk_widget_items_parent_id', '{{%widget_items}}', 'parent_id', '{{%widget_items}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_widget_items_widgets_text_id', '{{%widget_items}}', 'widgets_text_id', '{{%widgets_text}}', 'id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_widget_items_parent_id', '{{%widget_items}}');
        $this->dropForeignKey('fk_widget_items_widgets_text_id', '{{%widget_items}}');
        $this->dropForeignKey('fk_widget_items_translation_slider_items', '{{%widget_items_translation}}');

        $this->dropTable('{{%widgets_text}}');
        $this->dropTable('{{%widget_items}}');
    }
}
