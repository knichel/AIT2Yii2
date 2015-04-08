<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Section;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;

$section = new Section();
$sections = Section::find2()->teacherSectionList()->all();

foreach($sections as $s){
    $sectionList[] = ['section_id'=>$s->section_id,'course_name'=>$s->term['term_name']."-".$s->course['course_name']];
}

?>
<div class="category-index">

    <?= Html::activeDropDownList($section, 'section_id',
      ArrayHelper::map($sectionList, 'section_id', 'course_name')) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'category_id',
            'category_name',
            ['attribute'=>'term' ,'value'=>'section.term.term_name'],
            ['attribute'=>'course' ,'value'=>'section.course.course_name'],
            //'section_id',
            'category_weight',
            'category_ord',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
