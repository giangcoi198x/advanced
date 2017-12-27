<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_postnews`.
 * Has foreign keys to the tables:
 *
 * - `oncology_lookupitem`
 */
class m171225_040440_create_oncology_postnews_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_postnews', [
            'id' => $this->primaryKey(),
            'title' => $this->string(300),
            'content' => $this->text()->notNull(),
            'short_desc' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'photo' => $this->string(200),
            'category_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-oncology_postnews-category_id',
            'oncology_postnews',
            'category_id'
        );

        // add foreign key for table `oncology_lookupitem`
        $this->addForeignKey(
            'fk-oncology_postnews-category_id',
            'oncology_postnews',
            'category_id',
            'oncology_lookupitem',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `oncology_lookupitem`
        $this->dropForeignKey(
            'fk-oncology_postnews-category_id',
            'oncology_postnews'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-oncology_postnews-category_id',
            'oncology_postnews'
        );

        $this->dropTable('oncology_postnews');
    }
}
