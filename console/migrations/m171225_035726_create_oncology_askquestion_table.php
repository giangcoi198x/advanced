<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_askquestion`.
 */
class m171225_035726_create_oncology_askquestion_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_askquestion', [
            'id' => $this->primaryKey(),
            'name_patient' => $this->string(200)->notNull(),
            'email' => $this->string(200)->notNull(),
            'mobile_number' => $this->string(25)->notNull(),
            'content' => $this->text()->notNull(),
            'create_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_askquestion');
    }
}
