<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = 'Create New Student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
        'us' => $us,
    ]) ?>

</div>
