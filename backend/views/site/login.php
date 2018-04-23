<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login Page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
<hr>

    <div class="row">
        <div class="col-lg-5 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'style'=>'font-size: 22px;height: 50px;text-align: center;border-radius: 0;']) ?>

                <?= $form->field($model, 'password')->passwordInput(['style'=>'font-size: 22px;height: 50px;text-align: center;border-radius: 0;']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <hr>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
