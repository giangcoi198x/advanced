<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oncology_post`.
 */
class m171226_105335_create_oncology_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oncology_post', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'category' => $this->integer()->defaultValue(0),
            'slug' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
            'desc' => $this->string(),
            'content' => $this->text()->notNull(),
            'author' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'publish_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oncology_post');
    }
}
