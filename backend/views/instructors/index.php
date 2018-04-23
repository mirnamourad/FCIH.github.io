<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InstructorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Instructors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr>
    <p>
        <?= Html::a('Create New Instructor', ['create'], ['class' => 'btn btn-success pull-right','style' => 'margin-bottom:20px;']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'instructorname',
            'instructoremail:email',
            'instructorpassword',
            //'userid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
