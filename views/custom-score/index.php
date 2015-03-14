<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomScoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custom Scores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-score-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Custom Score', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'custom_score_id',
            ['attribute'=>'teacherFirst', 'value' => 'teacher.first_name'],
            ['attribute'=>'teacherLast', 'value' => 'teacher.last_name'],
            //'teacher_id',
            ['attribute'=>'schoolYear', 'value' => 'schoolYear.school_year_description'],
            //'school_year_id',
            'code',
            'long_name',
            // 'grade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
