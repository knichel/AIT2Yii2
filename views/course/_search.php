<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'course_name') ?>

    <?= $form->field($model, 'school_year_id') ?>

    <?= $form->field($model, 'is_core') ?>

    <?php // echo $form->field($model, 'ed_center_id') ?>

    <?php // echo $form->field($model, 'SectionID') ?>

    <?php // echo $form->field($model, 'minutes') ?>

    <?php // echo $form->field($model, 'period') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
