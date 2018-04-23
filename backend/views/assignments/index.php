<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssignmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<hr>
    <p>
        <?= Html::a('Create New Assignment', ['create'], ['class' => 'btn btn-success pull-right','style' => 'margin-bottom:20px;']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'assignmentname',
            'deadline',
            'assignment_file',
            'instructor.instructorname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
