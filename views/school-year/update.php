<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolYear */

$this->title = 'Update School Year: ' . ' ' . $model->school_year_id;
$this->params['breadcrumbs'][] = ['label' => 'School Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->school_year_id, 'url' => ['view', 'id' => $model->school_year_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
