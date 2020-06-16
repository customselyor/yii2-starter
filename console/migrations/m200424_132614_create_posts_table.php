<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m200424_132614_create_posts_table extends Migration
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
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'lavozim_id' => $this->integer(),
            'gender_id' => $this->integer(),
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
            'child_id' => $this->integer(),
            'published_at' => $this->integer(),
            'author_id' => $this->integer(),
            'updater_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

//    fio titlega ketaveradi
        $this->createTable('{{%posts_translation}}', [
            'id' => $this->primaryKey(),
            'posts_id' => $this->integer(),
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

        $this->addForeignKey('fk_posts_category', '{{%posts}}', 'category_id', '{{%post_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_posts_lavozim', '{{%posts}}', 'lavozim_id', '{{%lavozim}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_posts_gender', '{{%posts}}', 'gender_id', '{{%gender}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_posts_translation', '{{%posts_translation}}', 'posts_id', '{{%posts}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_post_parent', '{{%posts}}', 'parent_id', '{{%posts}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_post_child', '{{%posts}}', 'child_id', '{{%posts}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_posts_author', '{{%posts}}', 'author_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_posts_updater', '{{%posts}}', 'updater_id', '{{%user}}', 'id', 'set null', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts}}');

        $this->dropForeignKey('fk_posts_category', '{{%posts}}');
        $this->dropForeignKey('fk_post_parent', '{{%posts}}');
        $this->dropForeignKey('fk_post_child', '{{%posts}}');
        $this->dropForeignKey('fk_posts_lavozim', '{{%posts}}');
        $this->dropForeignKey('fk_posts_gender', '{{%posts}}');
        $this->dropForeignKey('fk_posts_author', '{{%posts}}');
        $this->dropForeignKey('fk_posts_updater', '{{%posts}}');
        $this->dropForeignKey('fk_posts_translation', '{{%posts_translation}}');
    }
}
