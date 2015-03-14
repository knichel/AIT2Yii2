<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'assignment_name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'due_date')->textInput() ?>

    <?= $form->field($model, 'max_score')->textInput() ?>

    <?= $form->field($model, 'assignment_weight')->textInput() ?>

    <?= $form->field($model, 'assignment_note')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'is_extra_credit')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
