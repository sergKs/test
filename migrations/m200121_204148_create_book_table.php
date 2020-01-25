<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200121_204148_create_book_table extends Migration
{
    private const TABLE = 'book';

    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'author_id' => $this->integer(),
            'img' => $this->string(),
            'average_mark' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_book_author',
            self::TABLE,
            'author_id',
            'author',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }
}
