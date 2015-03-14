<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomScore */

$this->title = 'Update Custom Score: ' . ' ' . $model->custom_score_id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->custom_score_id, 'url' => ['view', 'id' => $model->custom_score_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-score-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
