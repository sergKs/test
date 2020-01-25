<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 *
 * @property void $authKey
 * @property string|mixed|int $id
 * @property string $email
 * @property string $password
 * @property string $token
 * @property string $login
 */
class User extends ActiveRecord implements IdentityInterface
{
    private const TABLE = 'user';

    public $password_confirm;

    public $role;

    public static function tableName()
    {
        return self::TABLE;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    public function rules()
    {
        return [
            [['login', 'email', 'password'], 'string', 'message' => 'Поле должно быть строкой'],
            [['login'], 'unique', 'message' => 'Пользователь с токим логином уже существует'],
            [['password', 'password_confirm', 'login'], 'required', 'message' => 'Вы не заполнили поля'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],
            [['role'], 'integer']
        ];
    }

    public function beforeSave($insert)
    {
        $this->password = $this->getHashPassword($this->password);

        return parent::beforeSave($insert);
    }


    /**
     * @param int|string $id
     * @return User|IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return array|ActiveRecord|IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::find()->where(['token' => $token])->one();
    }

    /**
     * @return int|mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    public static function findByLogin($login)
    {
        return User::find()->where(['login' => $login])->one();
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }

    private function getHashPassword($password)
    {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}