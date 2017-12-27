<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_case`.
 * Has foreign keys to the tables:
 *
 * - `oncology_patient`
 */
class m171225_034507_create_oncology_case_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_case', [
            'id' => $this->primaryKey(),
            'cancer_type' => $this->string(100)->notNull(),
            'oncology_patient_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `oncology_patient_id`
        $this->createIndex(
            'idx-oncology_case-oncology_patient_id',
            'oncology_case',
            'oncology_patient_id'
        );

        // add foreign key for table `oncology_patient`
        $this->addForeignKey(
            'fk-oncology_case-oncology_patient_id',
            'oncology_case',
            'oncology_patient_id',
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
        // drops foreign key for table `oncology_patient`
        $this->dropForeignKey(
            'fk-oncology_case-oncology_patient_id',
            'oncology_case'
        );

        // drops index for column `oncology_patient_id`
        $this->dropIndex(
            'idx-oncology_case-oncology_patient_id',
            'oncology_case'
        );

        $this->dropTable('oncology_case');
    }
}
