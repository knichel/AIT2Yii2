<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            'username',
            'first_name',
            'last_name',
            // 'school.school_name',
            // 'password',
            // 'email:email',
            // 'send_attend_email:email',
            // 'secret_question1',
            // 'secret_answer1',
            // 'secret_question2',
            // 'secret_answer2',
            // 'grade_level',
            // 'is_active',
            // 'school_id',
            // 'phone',
            // 'address1',
            // 'address2',
            // 'city',
            // 'state',
            // 'zip',
            // 'pass_change_code',
            // 'weekly_progress',
            // 'created_by',
            // 'created_date',
            // 'parent_link_code',
            // 'last_login',
            ['attribute' => 'school', 'value' => 'school.school_name'],
            //['attribute']=> 'secretQuestion', 'value' => 'secretQuestion.secret_question_id'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
