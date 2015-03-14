<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\ArrayHelper; // to create dropDownList
use app\models\EdCenter; // to use relation in dropDownList
use app\models\SchoolYear;
use app\models\User;
use app\models\Term;
//use app\models\Section;

$userList=ArrayHelper::map(User::find()->all(),'user_id', 'fullName');
$centerList=ArrayHelper::map(EdCenter::find()->all(), 'ed_center_id', 'ed_center_name');
//$schoolYearList=ArrayHelper::map(SchoolYear::find()->all(),'school_year_id','school_year_description');
$termList=ArrayHelper::map(Term::find()->where(['school_year_id' => 9])->asArray()->all(),'term_id', 'term_name');
//$sectionList=Arrayhelper::map(Section::find()->all(),'term_id')


?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'teacher_id')->dropDownList($userList,['prompt'=>'-- Choose a Teacher --']) ?>

    <?php echo $form->field($model, 'course_name')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'is_core')->checkboxList([ 'Y' => 'Y', 'N' => 'N', ]) ?>
    
    <?php echo $form->field($model, 'minutes')->textInput() ?>

    <?php echo $form->field($model, 'period')->checkboxList([ 'AM' => 'AM', 'PM' => 'PM', ]) ?>
    
    <h3>Select Terms for Course</h3>
    <?php 
        echo Html::checkboxList('termsList', [140,141] , $termList, ['separator'=>'<br>']); //141 is array of ID of selected value...
    ?>
    
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
