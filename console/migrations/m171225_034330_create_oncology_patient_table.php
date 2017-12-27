<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_patient`.
 */
class m171225_034330_create_oncology_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_patient', [
            'id' => $this->primaryKey(),
            'patient_name' => $this->string(100)->notNull(),
            'gender' => $this->string(3)->notNull(),
            'age' => $this->integer(11)->notNull(),
            'mobile' => $this->string(50)->notNull(),
            'photo' => $this->string(100),
            'address' => $this->string(300),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_patient');
    }
}
