<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SchoolYear;
use app\models\EdCenter;
use yii\helpers\ArrayHelper; // to create dropDownList

/* @var $this yii\web\View */
/* @var $model app\models\Term */
/* @var $form yii\widgets\ActiveForm */

$centerList=ArrayHelper::map(EdCenter::find()->all(), 'ed_center_id', 'ed_center_name');
$schoolYearList=ArrayHelper::map(SchoolYear::find()->all(),'school_year_id','school_year_description');
?>

<div class="term-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ed_center_id')->dropDownList($centerList,['prompt'=>'-- Choose a Center --']) ?>

    <?= $form->field($model, 'school_year_id')->dropDownList($schoolYearList,['prompt'=>'-- Choose a Year --']) ?>

    <?= $form->field($model, 'term_name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'term_weight')->textInput() ?>

    <?= $form->field($model, 'term_start_date')->textInput() ?>

    <?= $form->field($model, 'term_end_date')->textInput() ?>

    <?= $form->field($model, 'interims_due_date')->textInput() ?>

    <?= $form->field($model, 'grades_due_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
