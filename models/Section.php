<?php

namespace app\models;

use Yii;
use app\models\SectionsQuery;

/**
 * This is the model class for table "section".
 *
 * @property integer $section_id
 * @property string $created_date
 * @property integer $term_id
 * @property integer $course_id
 *
 * @property Category[] $categories
 * @property Comment[] $comments
 * @property IncidentReferral[] $incidentReferrals
 * @property Course $course
 * @property Term $term
 * @property Student2class[] $student2classes
 * @property User[] $users
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_date'], 'safe'],
            [['term_id', 'course_id'], 'required'],
            [['term_id', 'course_id'], 'integer'],
            [['term_id', 'course_id'], 'unique', 'targetAttribute' => ['term_id', 'course_id'], 'message' => 'The combination of Term ID and Course ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'created_date' => 'Created Date',
            'term_id' => 'Term',
            'course_id' => 'Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentReferrals()
    {
        return $this->hasMany(IncidentReferral::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Term::className(), ['term_id' => 'term_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent2classes()
    {
        return $this->hasMany(Student2class::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_id' => 'user_id'])->viaTable('student2class', ['section_id' => 'section_id']);
    }

    public static function find2()
    {
        return new SectionsQuery(get_called_class());
    }

    public static function getTeacherSectionList()
    {
        $session = Yii::$app->session;
        $query = Section::find();
        $query->joinWith('course');
        $query->joinWith('term');
        $query->where(['course.teacher_id'=>$session['user.user_id']]);
        $query->andWhere(['course.school_year_id'=> $session['schoolYears.currentSchoolYear']]);
        $query->orderBy('term.term_name, course.is_core desc, course.course_name');

        return $query;
    }
}
