<div class="cnt-bg">
    <?php if ($model->img) {?>
        <?php foreach (\yii\helpers\Json::decode($model->img) as $img) { ?>
            <img src="/uploads/<?= $img?>" class="img" alt="">
        <?php } ?>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6"><h4>Название</h4></div>
        <div class="col-lg-6"><?= $model->name ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><h4>Описание</h4></div>
        <div class="col-lg-6"><?= $model->description ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><h4>Автор</h4></div>
        <div class="col-lg-6"><?= $model->author->name ?></div>
    </div>

</div>