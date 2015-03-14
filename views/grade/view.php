<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grade */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'student_id' => $model->student_id, 'assignment_id' => $model->assignment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'student_id' => $model->student_id, 'assignment_id' => $model->assignment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'assignment_id',
            'raw_score',
            'comment',
        ],
    ]) ?>

</div>
