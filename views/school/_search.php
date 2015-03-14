<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'school_id') ?>

    <?php echo $form->field($model, 'school_name') ?>

    <?php echo $form->field($model, 'attend_officer') ?>

    <?php echo $form->field($model, 'attend_email') ?>

    <?php echo $form->field($model, 'ed_center_id') ?>

    <?php //echo $form->field($model, 'phone') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
