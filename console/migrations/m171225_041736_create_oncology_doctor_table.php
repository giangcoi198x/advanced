<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_doctor`.
 * Has foreign keys to the tables:
 *
 * - `oncology_hospital`
 */
class m171225_041736_create_oncology_doctor_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_doctor', [
            'id' => $this->primaryKey(),
            'doctor_name' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'mobile' => $this->string(25)->notNull(),
            'address' => $this->text()->notNull(),
            'department' => $this->string(100)->notNull(),
            'description' => $this->text()->notNull(),
            'hospital_id' => $this->integer()->notNull(),
            'image' => $this->string(100)->notNull(),
            'active' => $this->integer(2)->defaultValue(1)->notNull(),
        ]);

        // creates index for column `hospital_id`
        $this->createIndex(
            'idx-oncology_doctor-hospital_id',
            'oncology_doctor',
            'hospital_id'
        );

        // add foreign key for table `oncology_hospital`
        $this->addForeignKey(
            'fk-oncology_doctor-hospital_id',
            'oncology_doctor',
            'hospital_id',
            'oncology_hospital',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `oncology_hospital`
        $this->dropForeignKey(
            'fk-oncology_doctor-hospital_id',
            'oncology_doctor'
        );

        // drops index for column `hospital_id`
        $this->dropIndex(
            'idx-oncology_doctor-hospital_id',
            'oncology_doctor'
        );

        $this->dropTable('oncology_doctor');
    }
}
