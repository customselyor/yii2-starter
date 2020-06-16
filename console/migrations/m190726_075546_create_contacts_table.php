<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m190726_075546_create_contacts_table extends Migration
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

        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0),
            'email' => $this->string(255)->notNull(),
            'phone' => $this->string(50)->notNull(),
            'phone2' => $this->string(50),
            'phone3' => $this->string(50),
            'fax' => $this->string(50),
            'fax2' => $this->string(50),
            'fax3' => $this->string(50),
            'map' => $this->text(),
            'image' => $this->string(255),
            'og_image' => $this->string(255),
            'detail_image' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%contacts_translation}}', [
            'id' => $this->primaryKey(),
            'contacts_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'site_name' => $this->text(),
            'site_name2' => $this->text(),
            'footer_menu' => $this->text(),
            'footer_info' => $this->text(),
            'contacts_info' => $this->text(),
            'home_description' => $this->text(),
            'footer_description' => $this->text(),
            'address_locality' => $this->text(),
            'street_address' => $this->text(),
            'street_address2' => $this->text(),
            'legal_name' => $this->string(255),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_contacts_translation_contacts', '{{%contacts_translation}}', 'contacts_id', '{{%contacts}}', 'id', 'cascade', 'cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_contacts_translation_contacts', '{{%contacts_translation}}');

        $this->dropTable('{{%contacts}}');
        $this->dropTable('{{%contacts_translation}}');
    }
}
