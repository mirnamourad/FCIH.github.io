<?php

use backend\models\Assignments;
use backend\models\Instructors;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Assignments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assignments-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'assignmentname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'file')->fileInput(); ?>


    <?php
    if ($_SESSION['user_type'] == 3)
    {
        $query = Instructors::find()->where(['userid'=>$_SESSION['user_id']]);
        foreach ($query->all() as $studentID) {
            $usertype = $studentID['id'];
        }
        ?>
        <?= $form->field($model, 'instructor_id')->hiddenInput(['value' => $usertype])->label(false) ?>

    <?php
        //echo $usertype;
//

        //echo $form->field($model, 'instructor_id')->hiddenInput(['maxlength' => true,'value'=>$_SESSION['user_id']]);
    }
    else if ($_SESSION['user_type'] == 1){
        echo $form->field($model, 'instructor_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Instructors::find()->all(),'id','instructorname'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Instructor ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    }

    ?>


    <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create New Assignment' : 'Update Assignment Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
