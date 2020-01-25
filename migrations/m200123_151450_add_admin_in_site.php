<?php

use yii\db\Migration;
use yii\db\Query;

class m200123_151450_add_admin_in_site extends Migration
{
    private const TABLE = 'user';

    public function safeUp()
    {
        $query = new Query();
        $query->createCommand()->insert(self::TABLE,
            [
                'login' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $query = new Query();
        $query->createCommand()->delete(self::TABLE, [
            'login' => 'admin'
        ])->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200123_151450_add_admin_in_site cannot be reverted.\n";

        return false;
    }
    */
}
