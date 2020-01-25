<?php

namespace app\modules\manager;

use app\models\enums\Role;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Role::MANAGER]
                    ]
                ]
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\manager\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
