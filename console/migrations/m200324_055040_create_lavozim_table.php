<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lavozim}}`.
 */
class m200324_055040_create_lavozim_table extends Migration
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

        $this->createTable('{{%lavozim}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%lavozimLang}}', [
            'id' => $this->primaryKey(),
            'lavozim_id' => $this->integer(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'extra1' => $this->text(),
            'extra2' => $this->text(),
            'extra3' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_lavozim_lavozimLang', '{{%lavozimLang}}', 'lavozim_id', '{{%lavozim}}', 'id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_lavozim_lavozimLang', '{{%lavozimLang}}');

        $this->dropTable('{{%lavozim}}');
        $this->dropTable('{{%lavozimLang}}');
    }
}
