<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_user`.
 */
class m171225_045321_create_auth_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_user', [
            'id' => $this->primaryKey(),
            'password' => $this->string(128)->notNull(),
            'last_login' => $this->integer(),
            'is_superuser' => $this->integer(1)->notNull(),
            'username' => $this->string(150)->notNull(),
            'first_name' => $this->string(30)->notNull(),
            'last_name' => $this->string(30)->notNull(),
            'email' => $this->string(254)->notNull(),
            'is_staff' => $this->integer(1)->notNull(),
            'is_active' => $this->integer(1)->notNull(),
            'date_joined' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auth_user');
    }
}
