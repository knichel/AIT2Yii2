<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomScoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-score-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'custom_score_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'school_year_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'long_name') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
