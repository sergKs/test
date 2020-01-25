<?php

use yii\db\Migration;

class m200121_110457_add_field_token_in_model_user extends Migration
{
    private const TABLE = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            self::TABLE,
            'token',
            $this->string()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(
            self::TABLE,
            'token'
        );
    }
}
