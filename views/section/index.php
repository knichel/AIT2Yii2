<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Section', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'section_id',
            //'created_date',
            ['attribute'=>'termName', 'value' => 'term.term_name'],
            //'term_id',
            //'is_core',
            ['attribute'=>'courseName', 'value' => 'course.course_name'],
            //'course_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
