<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\models\enums\Role;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$user = Yii::$app->user;

AppAsset::register($this);


function getLogin($user) {
    if (isset($user->identity->login)) {

        return $user->identity->login;
    }

    return '';
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Home',
                'url' => Url::toRoute(['site/home'])
            ],
            [
                'label' => 'Register',
                'url' => Url::toRoute(['auth/register']),
                'visible' => $user->isGuest
            ],
            [
                'label' => 'Login',
                'url' => Url::toRoute(['auth/login']),
                'visible' => $user->isGuest
            ],

            [
                'label' => 'logout(' . getLogin($user) . ')',
                'url' => Url::toRoute(['/auth/logout']),
                'visible' => !$user->isGuest
            ],
            [
                'label' => 'Администрация :)',
                'url' => Url::toRoute(['admin/admin/index']),
                'visible' => $user->can(Role::ADMIN)
            ],
            [
                'label' => 'Для менеджеров :)',
                'url' => Url::toRoute(['manager/manager/index']),
                'visible' => $user->can(Role::MANAGER)
            ]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
