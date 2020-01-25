<?php

use yii\helpers\Url;

?>
<div class="container">
    <a href="<?= Url::toRoute(['user/index']) ?>" class="btn btn-success">Пользователи</a>
    <a href="<?= Url::toRoute(['author/index']) ?>" class="btn btn-success">Авторы</a>
    <a href="<?= Url::toRoute(['book/index']) ?>" class="btn btn-success">Книги</a>
</div>