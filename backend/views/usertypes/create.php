<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Usertypes */

$this->title = 'Create New User Type';
$this->params['breadcrumbs'][] = ['label' => 'User Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertypes-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
