<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a('Create New Student', ['create'], ['class' => 'btn btn-success pull-right','style'=>'margin-bottom:20px;']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'studentname',
            'studentemail:email',
            'studentpassword',
            'studentphone',
            'studentstage0.stagename',
            // 'userid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
