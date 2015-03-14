<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!--?php echo $form->field($model, 'user_id') ?-->

    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'first_name') ?>

    <?php echo $form->field($model, 'last_name') ?>

    <?php echo $form->field($model, 'school_id') ?>

    <?php //echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'send_attend_email') ?>

    <?php // echo $form->field($model, 'secret_question1') ?>

    <?php // echo $form->field($model, 'secret_answer1') ?>

    <?php // echo $form->field($model, 'secret_question2') ?>

    <?php // echo $form->field($model, 'secret_answer2') ?>

    <?php // echo $form->field($model, 'grade_level') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address1') ?>

    <?php // echo $form->field($model, 'address2') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'pass_change_code') ?>

    <?php // echo $form->field($model, 'weekly_progress') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'parent_link_code') ?>

    <?php // echo $form->field($model, 'last_login') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
