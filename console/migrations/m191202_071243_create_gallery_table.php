<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gallery}}`.
 */
class m191202_071243_create_gallery_table extends Migration
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

        $this->createTable('{{%gallery_category}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'sort_index' => $this->integer(),
//            'urlcount' => $this->string(255)->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%gallery_category_translation}}', [
            'id' => $this->primaryKey(),
            'gallery_category_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
            'slug' => $this->string(255),
            'description' => $this->text(),
            'body' => $this->text(),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);
        $this->addForeignKey('fk_gallery_category_translation', '{{%gallery_category_translation}}', 'gallery_category_id', '{{%gallery_category}}', 'id', 'cascade', 'cascade');

        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey(),
            'gallery_category_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'is_favorite' => $this->smallInteger()->defaultValue(0),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'sort_index' => $this->integer(),
            'urlcount' => $this->string(255)->defaultValue(0),
            'hits_count' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%gallery_translation}}', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
            'slug' => $this->string(255),
            'description' => $this->text(),
            'body' => $this->text(),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_gallery_translation', '{{%gallery_translation}}', 'gallery_id', '{{%gallery}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_gallery_category_gallery', '{{%gallery}}', 'gallery_category_id', '{{%gallery_category}}', 'id', 'cascade', 'cascade');

        $this->createTable('{{%gallery_images}}', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer(),
            'image' => $this->string(255),

        ], $tableOptions);
        $this->addForeignKey('fk_gallery_images', '{{%gallery_images}}', 'gallery_id', '{{%gallery}}', 'id', 'cascade', 'cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_gallery_category_translation', '{{%gallery_category_translation}}');
        $this->dropForeignKey('fk_gallery_translation', '{{%gallery_translation}}');
        $this->dropForeignKey('fk_gallery_category_gallery', '{{%gallery}}');
        $this->dropForeignKey('fk_gallery_images', '{{%gallery_images}}');



        $this->dropTable('{{%gallery_images}}');
        $this->dropTable('{{%gallery_category}}');
        $this->dropTable('{{%gallery_category_translation}}');
        $this->dropTable('{{%gallery}}');
        $this->dropTable('{{%gallery_translation}}');

    }
}
