<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="term-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'term_id') ?>

    <?= $form->field($model, 'school_id') ?>

    <?= $form->field($model, 'ed_center_id') ?>

    <?= $form->field($model, 'school_year_id') ?>

    <?= $form->field($model, 'term_name') ?>

    <?php // echo $form->field($model, 'term_weight') ?>

    <?php // echo $form->field($model, 'term_start_date') ?>

    <?php // echo $form->field($model, 'term_end_date') ?>

    <?php // echo $form->field($model, 'term_ord') ?>

    <?php // echo $form->field($model, 'smsName') ?>

    <?php // echo $form->field($model, 'interims_due_date') ?>

    <?php // echo $form->field($model, 'grades_due_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
