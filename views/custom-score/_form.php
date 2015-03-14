<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // to create dropDownList
use app\models\User;
use app\models\SchoolYear;

/* @var $this yii\web\View */
/* @var $model app\models\CustomScore */
/* @var $form yii\widgets\ActiveForm */

$userList=ArrayHelper::map(User::find()->all(),'user_id', 'fullName');
$schoolYearList=ArrayHelper::map(SchoolYear::find()->all(),'school_year_id','school_year_description');

?>

<div class="custom-score-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'teacher_id')->dropDownList($userList,['prompt'=>'-- Choose a Teacher --']) ?>

    <?= $form->field($model, 'school_year_id')->dropDownList($schoolYearList,['prompt'=>'-- Choose a Teacher --']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'long_name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'grade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
