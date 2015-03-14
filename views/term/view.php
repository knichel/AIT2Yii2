<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Term */

$this->title = $model->term_id;
$this->params['breadcrumbs'][] = ['label' => 'Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->term_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->term_id], [
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
            //'term_id',
            //'ed_center_id',
            'edCenter.ed_center_name',
            //'school_year_id',
            'schoolYear.school_year_description',
            'term_name',
            'term_weight',
            'term_start_date',
            'term_end_date',
            'term_ord',
            //'smsName',
            'interims_due_date',
            'grades_due_date',
        ],
    ]) ?>

</div>
