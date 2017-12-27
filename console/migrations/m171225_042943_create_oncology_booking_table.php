<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_booking`.
 * Has foreign keys to the tables:
 *
 * - `oncology_hospital`
 * - `oncology_doctor`
 * - `oncology_patient`
 */
class m171225_042943_create_oncology_booking_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_booking', [
            'id' => $this->primaryKey(),
            'patient_name' => $this->string(100)->notNull(),
            'gender' => $this->string(3)->notNull(),
            'mobile' => $this->string(25)->notNull(),
            'email' => $this->string(100)->notNull(),
            'address' => $this->text()->notNull(),
            'type_booking' => $this->string(30)->notNull(),
            'datetimeExam' => $this->integer()->notNull(),
            'symptom' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string(30)->notNull(),
            'chanel_registration' => $this->string(20)->notNull(),
            'hospital_id' => $this->integer()->notNull(),
            'BOD' => $this->integer()->notNull(),
            'doctor_id' => $this->integer(),
            'active' => $this->integer(1)->notNull()->defaultValue(1),
            'patient_id' => $this->integer(),
        ]);

        // creates index for column `hospital_id`
        $this->createIndex(
            'idx-oncology_booking-hospital_id',
            'oncology_booking',
            'hospital_id'
        );

        // add foreign key for table `oncology_hospital`
        $this->addForeignKey(
            'fk-oncology_booking-hospital_id',
            'oncology_booking',
            'hospital_id',
            'oncology_hospital',
            'id',
            'CASCADE'
        );

        // creates index for column `doctor_id`
        $this->createIndex(
            'idx-oncology_booking-doctor_id',
            'oncology_booking',
            'doctor_id'
        );

        // add foreign key for table `oncology_doctor`
        $this->addForeignKey(
            'fk-oncology_booking-doctor_id',
            'oncology_booking',
            'doctor_id',
            'oncology_doctor',
            'id',
            'CASCADE'
        );

        // creates index for column `patient_id`
        $this->createIndex(
            'idx-oncology_booking-patient_id',
            'oncology_booking',
            'patient_id'
        );

        // add foreign key for table `oncology_patient`
        $this->addForeignKey(
            'fk-oncology_booking-patient_id',
            'oncology_booking',
            'patient_id',
            'oncology_patient',
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
            'fk-oncology_booking-hospital_id',
            'oncology_booking'
        );

        // drops index for column `hospital_id`
        $this->dropIndex(
            'idx-oncology_booking-hospital_id',
            'oncology_booking'
        );

        // drops foreign key for table `oncology_doctor`
        $this->dropForeignKey(
            'fk-oncology_booking-doctor_id',
            'oncology_booking'
        );

        // drops index for column `doctor_id`
        $this->dropIndex(
            'idx-oncology_booking-doctor_id',
            'oncology_booking'
        );

        // drops foreign key for table `oncology_patient`
        $this->dropForeignKey(
            'fk-oncology_booking-patient_id',
            'oncology_booking'
        );

        // drops index for column `patient_id`
        $this->dropIndex(
            'idx-oncology_booking-patient_id',
            'oncology_booking'
        );

        $this->dropTable('oncology_booking');
    }
}
