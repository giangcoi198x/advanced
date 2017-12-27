<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_type`.
 */
class m171225_072153_create_content_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('content_type', [
            'id' => $this->primaryKey(),
            'app_label' => $this->string(100)->notNull(),
            'model' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('content_type');
    }
}
