<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */

$this->title = 'Update Subject : ' . $model->subjectname;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subjectname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
