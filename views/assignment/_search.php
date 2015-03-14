<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssignmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assignment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'assignment_id') ?>

    <?= $form->field($model, 'assignment_name') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'due_date') ?>

    <?= $form->field($model, 'max_score') ?>

    <?php // echo $form->field($model, 'assignment_weight') ?>

    <?php // echo $form->field($model, 'assignment_note') ?>

    <?php // echo $form->field($model, 'is_extra_credit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
