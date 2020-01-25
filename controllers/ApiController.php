<?php


namespace app\controllers;


use app\models\Book;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionSearch()
    {
        $request = Yii::$app->request;

        $authorName = $request->get('author');

        $bookName = $request->get('book');

        $books = Book::find()
            ->joinWith('author')
            ->where(['author.name' => $authorName])
            ->andWhere(['book.name' => $bookName])->all();

        return Json::encode($books);
    }

    public function actionBookInfo($id)
    {
        return Json::encode(Book::find()->select(['book.*'])->joinWith('author')->where(['book.id' => $id])->one());
    }
}