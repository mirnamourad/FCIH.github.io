<?php

use backend\models\Instructors;
use backend\models\Students;
use backend\models\StudentsSubjects;
use backend\models\Subjects;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $query = StudentsSubjects::find()
        ->where(['subject_id'=>$_SESSION['user_id']]);
    foreach ($query->all() as $studentID) {
        $subject = $studentID['id'];
    }
    ?>

    <?=
    $form->field($model, 'subject_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Subjects::find()->all(),'id','subjectname'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Subject ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?php

        if ($_SESSION['user_type'] == 2)
        {

            $query = Students::find()->where(['userid'=>$_SESSION['user_id']]);
            foreach ($query->all() as $studentID) {
                $usertype = $studentID['id'];
            }
        ?>
            <?= $form->field($model, 'student_id')->hiddenInput(['value' => $usertype])->label(false) ?>
        <?php
        }
    ?>

    <?= $form->field($model, 'pay_or_not')->hiddenInput(['value' => 0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Register This Subject' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
