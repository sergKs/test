<?php

namespace app\modules\manager\controllers;


use app\models\Author;
use app\models\Book;
use app\models\search\BookSearch;
use Yii;
use yii\web\Controller;

class ManagerController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBookList()
    {
        $searchModel = new BookSearch();
        $request = Yii::$app->request;
        $authors = Author::getArrayAuthors();
        $dataProvider = $searchModel->search($request->get());

        return $this->render('books', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'authors' => $authors
        ]);
    }

    public function actionForm()
    {
        $authors = Author::getArrayAuthors();

        return $this->render('form', [
            'authors' => $authors
        ]);
    }

    public function actionAuthorBook()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');

        $author = Author::findOne($id);

        $books = $author->getBooks()->select(['id', 'name'])->asArray()->all();


        foreach ($books as $item) {
            $booksArray[$item['id']] = $item['name'];
        }

        return $this->renderAjax('author_books', [
            'books' => $booksArray
        ]);
    }

    public function actionSaveReview()
    {
        $request = Yii::$app->request;

        $book = Book::findOne($request->post('book_id'));

        if ($book) {
            $book->average_mark = $request->post('average_mark');
            if ($book->save()) {
                return 'ok';
            }
        }
        return false;
    }
}