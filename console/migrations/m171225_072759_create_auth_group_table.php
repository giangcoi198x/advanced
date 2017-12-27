<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_group`.
 */
class m171225_072759_create_auth_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_group', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auth_group');
    }
}
