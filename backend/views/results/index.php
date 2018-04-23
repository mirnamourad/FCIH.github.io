<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<hr>
    <p>
        <?= Html::a('Add Grades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'student.studentname',
            'subject.subjectname',
            'grade',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
