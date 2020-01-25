<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionHome()
    {
        return $this->render('index');
    }
}
