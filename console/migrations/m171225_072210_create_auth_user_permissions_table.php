<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_user_permissions`.
 * Has foreign keys to the tables:
 *
 * - `auth_user`
 * - `auth_permission`
 */
class m171225_072210_create_auth_user_permissions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_user_permissions', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'permission_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-auth_user_permissions-user_id',
            'auth_user_permissions',
            'user_id'
        );

        // add foreign key for table `auth_user`
        $this->addForeignKey(
            'fk-auth_user_permissions-user_id',
            'auth_user_permissions',
            'user_id',
            'auth_user',
            'id',
            'CASCADE'
        );

        // creates index for column `permission_id`
        $this->createIndex(
            'idx-auth_user_permissions-permission_id',
            'auth_user_permissions',
            'permission_id'
        );

        // add foreign key for table `auth_permission`
        $this->addForeignKey(
            'fk-auth_user_permissions-permission_id',
            'auth_user_permissions',
            'permission_id',
            'auth_permission',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `auth_user`
        $this->dropForeignKey(
            'fk-auth_user_permissions-user_id',
            'auth_user_permissions'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-auth_user_permissions-user_id',
            'auth_user_permissions'
        );

        // drops foreign key for table `auth_permission`
        $this->dropForeignKey(
            'fk-auth_user_permissions-permission_id',
            'auth_user_permissions'
        );

        // drops index for column `permission_id`
        $this->dropIndex(
            'idx-auth_user_permissions-permission_id',
            'auth_user_permissions'
        );

        $this->dropTable('auth_user_permissions');
    }
}
