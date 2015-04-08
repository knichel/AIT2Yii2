<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Section */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\ArrayHelper; // to create dropDownList
use app\models\Course; // to use relation in dropDownList
use app\models\Term;

$courseList=ArrayHelper::map(Course::find()->all(), 'course_id', 'course_name');
$termList=ArrayHelper::map(Term::find()->all(), 'term_id', 'term_name');

/*
 * NEED TO FIGURE OUT HOW TO USE A TEACHER SELECTOR FIRST
 * THEN RETREIVE THE LIST OF COURSES FOR SELECTED TEACHER
 * 
 * ALSO ONLY TERMS FOR CURRENT SCHOOL YEAR
 */


?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'term_id')->dropDownList($termList,['prompt'=>'--Choose a Term--']) ?>

    <?php echo $form->field($model, 'course_id')->dropDownList($courseList,['prompt'=>'--Choose a Course--']) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
