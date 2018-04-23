<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentsSubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-subjects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<hr>
    <p>
        <?= Html::a('Register Subjects For Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'subject.subjectname',
            'student.studentname',
            'pay_or_not',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
