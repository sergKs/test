<?php

use yii\db\Migration;

/**
 * Class m200118_182349_create_fields_in_table_user
 */
class m200118_182349_create_fields_in_table_user extends Migration
{
    public const TABLE = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            self::TABLE,
            'created_at',
            $this->integer());

        $this->addColumn(
            self::TABLE,
            'updated_at',
            $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn(self::TABLE, 'created_at');
      $this->dropColumn(self::TABLE, 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200118_182349_create_filds_in_table_user cannot be reverted.\n";

        return false;
    }
    */
}
