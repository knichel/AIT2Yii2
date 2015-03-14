<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'course_id',
            //'teacher_id',
            ['attribute'=>'teacherFirst', 'value' => 'teacher.first_name'],
            ['attribute'=>'teacherLast', 'value' => 'teacher.last_name'],
            //'teacher.first_name',
            'course_name',
            //'school_year_id',
            ['attribute'=>'schoolYear', 'value' => 'schoolYear.school_year_description'],
            'is_core',
            // 'ed_center_id',
            // 'minutes',
            // 'period',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
