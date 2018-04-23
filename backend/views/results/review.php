<?php

use backend\models\Results;
use backend\models\Students;
use backend\models\Subjects;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Results */

$this->title = 'Results';
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <p>
    <div class="row">
        <div class="col-lg-12">


                <?php



                //$query2 = Results::find()->where(['student_id'=>$usertype]);
                foreach ($test2 as $grades) {
                    $subjects = Subjects::find()->where(['id'=>$grades['subject_id']]);
                    foreach ($subjects->all() as $subject) {
                        $s = $subject['subjectname'];
                    }

                    $students = Students::find()->where(['id'=>$grades['student_id']]);
                    foreach ($students->all() as $student) {
                        $s2 = $student['studentname'];
                    }

                    echo '<div class="panel panel-primary">';
                    echo '<div class="panel-body">';
                    echo '<p>Student Name : '.$s2.'<p>';
                    echo '<p>Subject Name : '.$s.'<p>';
                    echo '<p>Grade : '.$grades['grade'].'<p>';
                    if ($grades['status'] == 'Success'){
                        echo '<p style="color:green;font-weight: bold;">Congratulation You Are Passed<p>';
                    }
                    if ($grades['status'] == 'Failed'){
                        echo '<p style="color:red;font-weight: bold;">Oops You Are Failed<p>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<hr>';

                }

//                print_r($test2);
                ?>

        </div>
    </div>
    </p>

</div>
