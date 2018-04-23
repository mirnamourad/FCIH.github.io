<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignments */

$this->title = 'Update Assignments: ' . $model->assignmentname;
$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assignmentname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assignments-update">

    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
