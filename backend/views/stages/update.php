<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stages */

$this->title = 'Update Stages: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
