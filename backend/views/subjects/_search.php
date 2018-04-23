<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subjectname') ?>

    <?= $form->field($model, 'subjectmingrade') ?>

    <?= $form->field($model, 'subjectmaxgrade') ?>

    <?= $form->field($model, 'subjectprice') ?>

    <?php // echo $form->field($model, 'maxstudents') ?>

    <?php // echo $form->field($model, 'instructor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
