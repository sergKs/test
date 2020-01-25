<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container">
    <?php
    $form = ActiveForm::begin();

    echo $form->field($model, 'login')->input('text', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo $form->field($model, 'password')->input('password', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo Html::submitButton('login', [
        'class' => 'btn btn-success'
    ]);

    ActiveForm::end();
    ?>
</div>

