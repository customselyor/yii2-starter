<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m200615_184048_data_table
 */
class m200615_184048_data_table extends Migration
{
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'Administrator',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'access_token' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('passwd'),
            'email' => 'webmaster@example.com',
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%user_profile}}', [
            'user_id' => 1,
        ]);

        $this->insert('{{%menu}}', [
            'title' => 'Основное меню',
            'key' => 'header-menu',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%menu_items}}', [
            'menu_id' => 1,
            'body' => 's:133:"[{"text":"","href":"","textoz":"","hrefoz":"","textru":"","hrefru":"","texten":"","hrefen":"","icon":"","target":"_self","title":""}]";',
            'created_at' => time(),
            'updated_at' => time(),
        ]);



        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.registration',
            'value' => 1,
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.email-confirm',
            'value' => 1,
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.theme-skin',
            'value' => 'skin-blue',
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-fixed',
            'value' => 0,
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-boxed',
            'value' => 0,
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-collapsed-sidebar',
            'value' => 0,
        ]);
        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-mini-sidebar',
            'value' => 0,
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%key_storage_item}}', [
            'key' => [
                'backend.theme-skin',
                'backend.layout-fixed',
                'backend.layout-boxed',
                'backend.layout-collapsed-sidebar',
                'backend.layout-mini-sidebar',
            ],
        ]);

        $this->delete('{{%key_storage_item}}', [
            'key' => 'frontend.registration',
            'key' => 'frontend.email-confirm',
        ]);

        $this->delete('{{%page}}', [
            'slug' => 'about',
        ]);


        $this->delete('{{%user_profile}}', [
            'user_id' => 1,
        ]);

        $this->delete('{{%user}}', [
            'id' => 1,
        ]);
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200615_184048_data_table cannot be reverted.\n";

        return false;
    }
    */
}
