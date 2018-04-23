<?php

use backend\models\Instructors;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subjectname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subjectmingrade')->hiddenInput(['value' => 50])->label(false) ?>

    <?= $form->field($model, 'subjectmaxgrade')->hiddenInput(['value' => 100])->label(false) ?>

    <?= $form->field($model, 'subjectprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxstudents')->hiddenInput(['value' => 100])->label(false) ?>

    <?=
    $form->field($model, 'instructor')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Instructors::find()->all(),'id','instructorname'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Instructor ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create New Subject' : 'Update Subject Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
