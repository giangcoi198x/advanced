<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_hospital`.
 */
class m171225_041726_create_oncology_hospital_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_hospital', [
            'id' => $this->primaryKey(),
            'hospital_name' => $this->string(150)->notNull(),
            'address' => $this->text()->notNull(),
            'email' => $this->string(100)->notNull(),
            'mobile' => $this->string(25)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_hospital');
    }
}
