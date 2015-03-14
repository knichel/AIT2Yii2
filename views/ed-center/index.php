<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdCenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ed Centers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ed-center-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ed Center', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ed_center_id',
            'ed_center_name',
            'short_name',
            'attend_officer',
            'attend_email:email',
            // 'sms_building_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
