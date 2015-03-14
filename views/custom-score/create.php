<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustomScore */

$this->title = 'Create Custom Score';
$this->params['breadcrumbs'][] = ['label' => 'Custom Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-score-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
