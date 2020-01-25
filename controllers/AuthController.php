<?php


namespace app\controllers;


use app\models\enums\Role;
use app\models\forms\LoginForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{

    public function actionLogin()
    {
        $model = new LoginForm();
        $request = Yii::$app->request;

        if ($request->isPost) {
            if ($model->load($request->post()) && $model->login()) {
                return $this->goHome();
            }
        }

        return $this->render('login', [
           'model' => $model
        ]);
    }

    public function actionRegister()
    {
        $model = new User();
        $authManager = Yii::$app->authManager;
        $request = Yii::$app->request;

        if ($request->isPost) {
            if ($model->load($request->post()) && $model->save()) {
                $userRole = $authManager->getRole(Role::USER);
                $authManager->assign($userRole, $model->id);
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались');
            } else {
                Yii::$app->session->setFlash('fail', 'Попробуйте позже');
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}