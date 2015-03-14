<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assignment */

$this->title = $model->assignment_id;
$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->assignment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->assignment_id], [
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
            //'assignment_id',
            'assignment_name',
            'category_id',
            'due_date',
            'max_score',
            'assignment_weight',
            'assignment_note',
            'is_extra_credit',
        ],
    ]) ?>

</div>
