<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Stages;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'studentname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'studentemail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'studentpassword')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'studentphone')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'studentstage')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Stages::find()->all(),'id','stagename'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Student Stage ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

<!--    <?//= $form->field($model, 'userid')->hiddenInput(['value' => 1]) ?>-->

    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create New Student' : 'Update Student Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
