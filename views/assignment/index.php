<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Assignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'assignment_id',
            'assignment_name',
            ['attribute'=>'category', 'value' => 'category.category_name'],
            //'category_id',
            'due_date',
            'max_score',
            'assignment_weight',
            'assignment_note',
            'is_extra_credit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
