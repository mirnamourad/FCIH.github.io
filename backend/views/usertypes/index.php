<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsertypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Type Management';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertypes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create New User Type', ['create'], ['class' => 'btn btn-success pull-right btn-lg','style'=>'margin-bottom:20px;']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usertypename',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
