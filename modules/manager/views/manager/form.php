<?php

use kartik\select2\Select2;
use yii\web\View;

$this->registerJsFile(
    Yii::$app->request->baseUrl . 'js/form.js',
    ['depends' => ['\yii\web\JqueryAsset']],
    View::POS_END
);

?>

<div class="container">
    <label for="author">Выберите автора</label>
    <?= Select2::widget([
        'name' => 'authors',
        'data' => $authors,
        'options' => [
            'placeholder' => 'Select author',
            'id' => 'author'
        ],
    ]); ?>

    <div id="author_books"></div>

    <label for="average_mark">Средний балл</label>
    <input type="text" id="average_mark" class="form-control">

    <input type="submit" class="btn btn-success" value="Отправить" id="send" onclick="send()">
</div>
