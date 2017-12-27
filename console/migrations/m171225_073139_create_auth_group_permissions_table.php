<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_group_permissions`.
 * Has foreign keys to the tables:
 *
 * - `auth_group`
 * - `auth_permission`
 */
class m171225_073139_create_auth_group_permissions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_group_permissions', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(11)->notNull(),
            'permission_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            'idx-auth_group_permissions-group_id',
            'auth_group_permissions',
            'group_id'
        );

        // add foreign key for table `auth_group`
        $this->addForeignKey(
            'fk-auth_group_permissions-group_id',
            'auth_group_permissions',
            'group_id',
            'auth_group',
            'id',
            'CASCADE'
        );

        // creates index for column `permission_id`
        $this->createIndex(
            'idx-auth_group_permissions-permission_id',
            'auth_group_permissions',
            'permission_id'
        );

        // add foreign key for table `auth_permission`
        $this->addForeignKey(
            'fk-auth_group_permissions-permission_id',
            'auth_group_permissions',
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
        // drops foreign key for table `auth_group`
        $this->dropForeignKey(
            'fk-auth_group_permissions-group_id',
            'auth_group_permissions'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            'idx-auth_group_permissions-group_id',
            'auth_group_permissions'
        );

        // drops foreign key for table `auth_permission`
        $this->dropForeignKey(
            'fk-auth_group_permissions-permission_id',
            'auth_group_permissions'
        );

        // drops index for column `permission_id`
        $this->dropIndex(
            'idx-auth_group_permissions-permission_id',
            'auth_group_permissions'
        );

        $this->dropTable('auth_group_permissions');
    }
}
