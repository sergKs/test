<?php
namespace app\modules\admin\controllers;

use app\models\search\BookSearch;
use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}