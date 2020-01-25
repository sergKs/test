<?php
namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 *
 * @property User $user
 */
class LoginForm extends Model
{
    private $_user = null;

    public $login;

    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'string'],
            [['login', 'password'], 'required'],
            [['password'], 'validatePassword']
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }

        return false;
    }

    public function validatePassword($attr)
    {
        if (!$this->hasErrors()) {
            $this->_user = $this->getUser();
            if (!$this->_user || ($this->_user && !$this->_user->validatePassword($this->password))) {
                $this->addError($attr, 'Нерпвельный логин или пароль');
            }
        }

        return true;
    }

    private function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
    }


}