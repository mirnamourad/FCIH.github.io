<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Results */

$this->title = 'Add Grade';
$this->params['breadcrumbs'][] = ['label' => 'All Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
