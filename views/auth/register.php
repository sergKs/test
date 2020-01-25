<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container">

    <?php if (Yii::$app->session->hasFlash('fail')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('fail'); ?>
        </div>
    <?php endif; ?>

    <?php
    $form = ActiveForm::begin();

    echo $form->field($model, 'login')->input('text', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo $form->field($model, 'email')->input('email', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo $form->field($model, 'password')->input('password', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo $form->field($model, 'password_confirm')->input('password', [
        'options' => [
            'class' => 'form-control'
        ]
    ]);

    echo Html::submitButton('Зарегистрироваться', [
        'class' => 'btn btn-success'
    ]);

    ActiveForm::end();
    ?>
</div>

