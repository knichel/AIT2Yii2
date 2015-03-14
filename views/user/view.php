<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
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
            //'user_id',
            'username',
            'first_name',
            'last_name',
            'password',
            'email:email',
            'send_attend_email',
            'secretQuestion1.secret_question_text',
            'secret_answer1',
            'secretQuestion2.secret_question_text',
            'secret_answer2',
            'grade_level',
            'is_active',
            'school.school_name',
            'phone',
            'address1',
            'address2',
            'city',
            'state',
            'zip',
            //'pass_change_code',
            'weekly_progress',
            //'created_by',
            'created_date',
            'parent_link_code',
            'last_login',
        ],
    ]) ?>

</div>
