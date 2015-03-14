<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdCenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ed-center-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ed_center_name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'attend_officer')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'attend_email')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'sms_building_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
