<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_user_groups`.
 * Has foreign keys to the tables:
 *
 * - `auth_user`
 * - `auth_group`
 */
class m171225_072807_create_auth_user_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_user_groups', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'group_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-auth_user_groups-user_id',
            'auth_user_groups',
            'user_id'
        );

        // add foreign key for table `auth_user`
        $this->addForeignKey(
            'fk-auth_user_groups-user_id',
            'auth_user_groups',
            'user_id',
            'auth_user',
            'id',
            'CASCADE'
        );

        // creates index for column `group_id`
        $this->createIndex(
            'idx-auth_user_groups-group_id',
            'auth_user_groups',
            'group_id'
        );

        // add foreign key for table `auth_group`
        $this->addForeignKey(
            'fk-auth_user_groups-group_id',
            'auth_user_groups',
            'group_id',
            'auth_group',
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
            'fk-auth_user_groups-user_id',
            'auth_user_groups'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-auth_user_groups-user_id',
            'auth_user_groups'
        );

        // drops foreign key for table `auth_group`
        $this->dropForeignKey(
            'fk-auth_user_groups-group_id',
            'auth_user_groups'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            'idx-auth_user_groups-group_id',
            'auth_user_groups'
        );

        $this->dropTable('auth_user_groups');
    }
}
