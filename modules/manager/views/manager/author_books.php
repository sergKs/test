<label for="author_books">Выберите книгу</label>
<?= \yii\helpers\Html::dropDownList(
    'author_books',
    null,
    $books,
    [
        'class' => 'form-control',
        'id' => 'book'
    ]
)
?>


