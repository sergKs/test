<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'author_id',
            'average_mark',
            [
                'attribute' => 'img',
                'format' => 'row',
                'content' => static function ($model) {
                    $images = Json::decode($model->img);

                    $html = '';

                    if ($images) {
                        foreach ($images as $image) {
                            $src = '/uploads/' . $image;
                            $html .= '<img src="' . $src . '" width="100" height="100" />';
                        }
                    }

                    return $html;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
