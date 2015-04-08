<?php

namespace app\models;

use yii\db\ActiveQuery;
use Yii;

class SectionsQuery extends ActiveQuery
{
    public function teacherSectionList()
    {
        $session = Yii::$app->session;          
                
        return $this->joinWith('term')
                    ->joinWith('course')
                    ->where(['course.teacher_id'=>$session['user.user_id']])
                    ->andWhere(['course.school_year_id'=> $session['schoolYears.currentSchoolYear']])
                    ->orderBy('term.term_name, course.is_core desc, course.course_name');

    }
}