<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_post_category`.
 */
class m171225_081432_create_oncology_post_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_post_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'slug' => $this->string()->unique()->notNull(),
            'parent' => $this->string()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_post_category');
    }
}
