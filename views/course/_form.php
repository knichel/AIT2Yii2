<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\ArrayHelper; // to create dropDownList
use app\models\User;
use app\models\Term;
//use dosamigos\datepicker\DatePicker; // github datepicker


$userList=ArrayHelper::map(User::find()->all(),'user_id', 'fullName');
$termList=ArrayHelper::map(Term::find()->where(['school_year_id' => 9])->asArray()->all(),'term_id', 'term_name');

?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'teacher_id')->dropDownList($userList,['prompt'=>'-- Choose a Teacher --']) ?>

    <?php echo $form->field($model, 'course_name')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'is_core')->radioList(['Y' => "Y", 'N' => "N"], ['itemOptions' => ['class' =>'radio-inline']]) ?>
    
    <?php echo $form->field($model, 'minutes')->textInput() ?>

    <?php echo $form->field($model, 'period')->radioList(['AM' => "AM", 'PM' => "PM"], ['itemOptions' => ['class' =>'radio-inline']]) ?>
        
    <?php 
        echo Html::activeHiddenInput($model, 'ed_center_id', ['value' => '1']); 
        echo Html::activeHiddenInput($model, 'school_year_id', ['value' => '9']) 
    ?>
    
    
    <h3>Select Terms for Course</h3>

    <?php 
        echo Html::checkboxList('termsList', $selected , $termList, ['separator'=>'<br>']); //141 is array of ID of selected value...
    ?>
    
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
