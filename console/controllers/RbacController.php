<?php
namespace app\console\controllers;


use app\models\enums\Role;
use app\models\User;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    /**
     * @return string
     * @throws \Exception
     * Create default role
     */
    public function actionSetRoles()
    {
        $authManager = Yii::$app->authManager;

        $roleAdmin = $authManager->createRole(Role::ADMIN);
        $roleAdmin->description = 'Администратор';
        $authManager->add($roleAdmin);

        $roleUser = $authManager->createRole(Role::USER);
        $roleUser->description = 'Пользователь';
        $authManager->add($roleUser);

        $roleManager = $authManager->createRole(Role::MANAGER);
        $roleManager->description = 'Менеджер';
        $authManager->add($roleManager);

        return '<h1>Роли успешно созданны</h1>';
    }

    public function actionSetRoleForUserAdmin()
    {
        $authManager = Yii::$app->authManager;


        $admin = User::find()->where(['login' => 'admin'])->one();
        $adminRole = $authManager->getRole(Role::ADMIN);
        $authManager->assign($adminRole, $admin->id);

        return 'ok';
    }
}