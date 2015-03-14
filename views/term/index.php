<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Term', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'term_id',
            ['attribute'=>'edCenter', 'value' => 'edCenter.ed_center_name'],
            //'ed_center_id',
            ['attribute'=>'schoolYear', 'value' => 'schoolYear.school_year_description'],
            //'school_year_id',
            'term_name',
            'term_weight',
            'term_start_date',
            'term_end_date',
            //'term_ord',
            // 'smsName',
            'interims_due_date',
            'grades_due_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
