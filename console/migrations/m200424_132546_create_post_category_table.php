<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category}}`.
 */
class m200424_132546_create_post_category_table extends Migration
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

        $this->createTable('{{%post_category}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255)->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'is_favorite' => $this->smallInteger()->defaultValue(0),

            'date_of_birth' => $this->string(255),
            'year' => $this->integer(),
            'month' => $this->integer(),
            'day' => $this->integer(),
            'age' => $this->integer(),

            'fax' => $this->string(255),
            'fax2' => $this->string(255),
            'email' => $this->string(255),
            'email2' => $this->string(255),
            'phone' => $this->string(255),
            'phone2' => $this->string(255),
            'phone3' => $this->string(255),
            'passport_seria' => $this->string(4),
            'passport_number' => $this->integer(),
            'inn' => $this->integer(),
            'avatar' => $this->string(255),
            'logo' => $this->string(255),
            'icon' => $this->string(255),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'sort_index' => $this->integer(),
            'urlcount' => $this->string(255)->defaultValue(0),
            'map' => $this->text(),
            'latitude' => $this->integer(),
            'longitude' => $this->integer(),
            'hits_count' => $this->integer(),
            'parent_id' => $this->integer(),
            'published_at' => $this->integer(),
            'author_id' => $this->integer(),
            'updater_id' => $this->integer(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%post_category_translation}}', [
            'id' => $this->primaryKey(),
            'post_category_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255),
            'slug' => $this->string(255),
            'description' => $this->text(),
            'address' => $this->text(),
            'address2' => $this->text(),
            'address3' => $this->text(),
            'body' => $this->text(),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);
        $this->addForeignKey('fk_post_category_translation', '{{%post_category_translation}}', 'post_category_id', '{{%post_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_post_category_parent', '{{%post_category}}', 'parent_id', '{{%post_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_post_post_category_author', '{{%post_category}}', 'author_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_post-post_category_updater', '{{%post_category}}', 'updater_id', '{{%user}}', 'id', 'set null', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post_category}}');
        $this->dropTable('{{%post_category_translation}}');
        $this->dropForeignKey('fk_post_category_parent', '{{%post_category}}');
        $this->dropForeignKey('fk_post_post_category_author', '{{%post_category}}');
        $this->dropForeignKey('post_category_updater', '{{%post_category}}');
        $this->dropForeignKey('fk_posts_translation', '{{%post_category_translation}}');

    }
}
