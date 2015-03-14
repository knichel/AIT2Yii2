<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // to create dropDownList

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

use app\models\School; // to use relation in dropDownList
use app\models\SecretQuestion;

$schoolList=ArrayHelper::map(School::find()->all(), 'school_id', 'school_name');
$questionList=ArrayHelper::map(SecretQuestion::find()->all(), 'secret_question_id', 'secret_question_text');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => 20]) ?>

    <?php echo $form->field($model, 'first_name')->textInput(['maxlength' => 20]) ?>

    <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => 20]) ?>

    <?php echo $form->field($model, 'password')->passwordInput(['maxlength' => 32]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'send_attend_email')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'secret_question1')->dropDownList($questionList,['prompt'=>'--Choose a Question--']) ?>

    <?php echo $form->field($model, 'secret_answer1')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'secret_question2')->dropDownList($questionList,['prompt'=>'--Choose a Question--']) ?>

    <?php echo $form->field($model, 'secret_answer2')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'grade_level')->textInput() ?>

    <?php echo $form->field($model, 'is_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'school_id')->dropDownList($schoolList,['prompt'=>'--Choose a School--']) ?>

    <?php echo $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>

    <?php echo $form->field($model, 'address1')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'address2')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'city')->textInput(['maxlength' => 30]) ?>

    <?php echo $form->field($model, 'state')->textInput(['maxlength' => 2]) ?>

    <?php echo $form->field($model, 'zip')->textInput(['maxlength' => 5]) ?>

    <?php echo $form->field($model, 'weekly_progress')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '--Email Progress Reports?--']) ?>
    
    <?php //echo $form->field($model, 'pass_change_code')->textInput(['maxlength' => 32]) ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_date')->textInput() ?>

    <?php //echo $form->field($model, 'parent_link_code')->textInput(['maxlength' => 36]) ?>

    <?php //echo $form->field($model, 'last_login')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
