<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // to create dropDownList
use app\models\EdCenter; // to use relation in dropDownList
use kartik\select2\Select2; // github dropdown suggest



/* @var $this yii\web\View */
/* @var $model app\models\School */
/* @var $form yii\widgets\ActiveForm */

// the list of ed centers for dropDownList
$centerList=ArrayHelper::map(EdCenter::find()->all(), 'ed_center_id', 'ed_center_name');

?>

<div class="school-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'attend_officer')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'attend_email')->textInput(['maxlength' => 100]) ?>

    <?php //echo $form->field($model, 'ed_center_id')->dropDownList($centerList,['prompt'=>'--Choose a Center--']) ?>
    <?php
        // Normal select with ActiveForm & model
        echo $form->field($model, 'ed_center_id')->widget(Select2::classname(), [
            'data' => $centerList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a center ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => 12]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
