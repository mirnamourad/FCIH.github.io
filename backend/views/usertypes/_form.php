<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Usertypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usertypes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usertypename')->textInput(['maxlength' => true]) ?>

    <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create New User Type' : 'Update User Type Data', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
