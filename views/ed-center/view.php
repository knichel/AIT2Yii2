<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EdCenter */

$this->title = $model->ed_center_id;
$this->params['breadcrumbs'][] = ['label' => 'Ed Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ed-center-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ed_center_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ed_center_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back',Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ed_center_id',
            'ed_center_name',
            'short_name',
            'attend_officer',
            'attend_email:email',
            'sms_building_id',
        ],
    ]) ?>

</div>
