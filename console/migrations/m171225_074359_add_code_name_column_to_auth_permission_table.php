<?php

use yii\db\Migration;

/**
 * Handles adding code_name to table `auth_permission`.
 */
class m171225_074359_add_code_name_column_to_auth_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auth_permission', 'code_name', $this->string(100)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('auth_permission', 'code_name');
    }
}
