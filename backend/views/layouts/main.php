<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'FACULTY SYSTEM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if ($_SESSION['user_type'] == 1){
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Students', 'url' => ['/students/index']],
            ['label' => 'Instructors', 'url' => ['/instructors/index']],
            ['label' => 'Stages', 'url' => ['/stages/index']],
            ['label' => 'Subjects', 'url' => ['/subjects/index']],
            ['label' => 'User Roles', 'url' => ['/usertypes/index']],
        ];
    }
    if ($_SESSION['user_type'] == 3){
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Students', 'url' => ['/students/index']],
            ['label' => 'Assignments', 'url' => ['/assignments/index']],
            ['label' => 'Assign Subject', 'url' => ['/results/index']],
        ];
    }
    if ($_SESSION['user_type'] == 2){
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Register Courses', 'url' => ['/students-subjects/create']],
            ['label' => 'Results', 'url' => Url::toRoute(['results/review'])],
        ];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; <?= 'FACULTY SYSTEM' ?> <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
