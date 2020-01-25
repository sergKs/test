<?php

use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    'enableClientValidation' => true,
                    'options' => ['onchange' => 'this.submit()'],
                ]) ?>
                    <div class="col-lg-6">
                        <?= $form->field($searchModel, 'name')->label('Поиск по нозванию') ?>
                    </div>
                    <div class="col-lg-6">
                        <label for="author_search">Поиск по автору</label>
                        <?= Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'author_id',
                            'data' => $authors,
                            'options' => [
                                'placeholder' => 'Select author',
                                'id' => 'author_search'
                            ],
                        ]);?>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
        <div class="col-lg-12">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_list'
            ]); ?>
        </div>
    </div>
</div>



