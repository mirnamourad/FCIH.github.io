<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Stages */

$this->title = 'Create Stages';
$this->params['breadcrumbs'][] = ['label' => 'Stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
