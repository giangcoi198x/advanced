<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_lookupitem`.
 * Has foreign keys to the tables:
 *
 * - `oncology_lookuptype`
 */
class m171225_040224_create_oncology_lookupitem_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_lookupitem', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'desc' => $this->text()->notNull(),
            'oncology_lookuptype_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `oncology_lookuptype_id`
        $this->createIndex(
            'idx-oncology_lookupitem-oncology_lookuptype_id',
            'oncology_lookupitem',
            'oncology_lookuptype_id'
        );

        // add foreign key for table `oncology_lookuptype`
        $this->addForeignKey(
            'fk-oncology_lookupitem-oncology_lookuptype_id',
            'oncology_lookupitem',
            'oncology_lookuptype_id',
            'oncology_lookuptype',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `oncology_lookuptype`
        $this->dropForeignKey(
            'fk-oncology_lookupitem-oncology_lookuptype_id',
            'oncology_lookupitem'
        );

        // drops index for column `oncology_lookuptype_id`
        $this->dropIndex(
            'idx-oncology_lookupitem-oncology_lookuptype_id',
            'oncology_lookupitem'
        );

        $this->dropTable('oncology_lookupitem');
    }
}
