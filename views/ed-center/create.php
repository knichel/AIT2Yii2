<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EdCenter */

$this->title = 'Create Ed Center';
$this->params['breadcrumbs'][] = ['label' => 'Ed Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ed-center-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
