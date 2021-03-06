<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdCenter */

$this->title = 'Update Ed Center: ' . ' ' . $model->ed_center_id;
$this->params['breadcrumbs'][] = ['label' => 'Ed Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ed_center_id, 'url' => ['view', 'id' => $model->ed_center_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ed-center-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
