<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stagename',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
