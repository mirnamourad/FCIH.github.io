<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Assignments */

$this->title = 'Create New Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignments-create">

    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
