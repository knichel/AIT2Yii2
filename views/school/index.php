<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create School', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'school_id',
            'school_name',
            'attend_officer',
            'attend_email:email',
            //'edCenter.ed_center_name',
            // 'phone',
            ['attribute' => 'edCenter', 'value' => 'edCenter.ed_center_name', 'label'=>'Center Name'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
