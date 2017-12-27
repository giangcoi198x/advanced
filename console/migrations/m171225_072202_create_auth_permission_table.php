<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auth_permission`.
 * Has foreign keys to the tables:
 *
 * - `content_type`
 */
class m171225_072202_create_auth_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth_permission', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'content_type_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `content_type_id`
        $this->createIndex(
            'idx-auth_permission-content_type_id',
            'auth_permission',
            'content_type_id'
        );

        // add foreign key for table `content_type`
        $this->addForeignKey(
            'fk-auth_permission-content_type_id',
            'auth_permission',
            'content_type_id',
            'content_type',
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
            'fk-auth_permission-content_type_id',
            'auth_permission'
        );

        // drops index for column `content_type_id`
        $this->dropIndex(
            'idx-auth_permission-content_type_id',
            'auth_permission'
        );

        $this->dropTable('auth_permission');
    }
}
