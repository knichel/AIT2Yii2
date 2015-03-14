<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomScore */

$this->title = $model->custom_score_id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-score-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->custom_score_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->custom_score_id], [
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
            //'custom_score_id',
            //'teacher_id',
            'teacher.first_name',
            'teacher.last_name',
            'schoolYear.school_year_description',
            //'school_year_id',
            'code',
            'long_name',
            'grade',
        ],
    ]) ?>

</div>
