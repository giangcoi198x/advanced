<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_session`.
 */
class m171225_070409_create_auth_session_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_session', [
            'id' => $this->primaryKey(),
            'session_key' => $this->string(40),
            'session_data' => $this->text(),
            'expired_date' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auth_session');
    }
}
