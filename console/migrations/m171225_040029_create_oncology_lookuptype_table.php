<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_lookuptype`.
 */
class m171225_040029_create_oncology_lookuptype_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_lookuptype', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_lookuptype');
    }
}
