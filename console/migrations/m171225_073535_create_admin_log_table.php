<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin_log`.
 * Has foreign keys to the tables:
 *
 * - `content_type`
 * - `auth_user`
 */
class m171225_073535_create_admin_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin_log', [
            'id' => $this->primaryKey(),
            'action_time' => $this->integer()->notNull(),
            'object_id' => $this->text()->notNull(),
            'object_repr' => $this->string(200)->notNull(),
            'action_flag' => $this->integer(5),
            'change_message' => $this->text(),
            'content_type_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `content_type_id`
        $this->createIndex(
            'idx-admin_log-content_type_id',
            'admin_log',
            'content_type_id'
        );

        // add foreign key for table `content_type`
        $this->addForeignKey(
            'fk-admin_log-content_type_id',
            'admin_log',
            'content_type_id',
            'content_type',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-admin_log-user_id',
            'admin_log',
            'user_id'
        );

        // add foreign key for table `auth_user`
        $this->addForeignKey(
            'fk-admin_log-user_id',
            'admin_log',
            'user_id',
            'auth_user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `content_type`
        $this->dropForeignKey(
            'fk-admin_log-content_type_id',
            'admin_log'
        );

        // drops index for column `content_type_id`
        $this->dropIndex(
            'idx-admin_log-content_type_id',
            'admin_log'
        );

        // drops foreign key for table `auth_user`
        $this->dropForeignKey(
            'fk-admin_log-user_id',
            'admin_log'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-admin_log-user_id',
            'admin_log'
        );

        $this->dropTable('admin_log');
    }
}
