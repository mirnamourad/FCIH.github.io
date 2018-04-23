<?php

use backend\models\Students;
use backend\models\Subjects;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Results */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="results-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?=
    $form->field($model, 'student_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Students::find()->all(),'id','studentname'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Student ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'grade')->textInput() ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
