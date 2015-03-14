<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdCenterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ed-center-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ed_center_id') ?>

    <?= $form->field($model, 'ed_center_name') ?>

    <?= $form->field($model, 'short_name') ?>

    <?= $form->field($model, 'attend_officer') ?>

    <?= $form->field($model, 'attend_email') ?>

    <?php // echo $form->field($model, 'sms_building_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
