<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instructorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instructoremail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instructorpassword')->passwordInput(['maxlength' => true]) ?>

    <!--    <?//= $form->field($model, 'userid')->hiddenInput(['value' => 1]) ?>-->

    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create New Instructor' : 'Update Instructor Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
