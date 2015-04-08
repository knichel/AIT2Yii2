<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $course_id
 * @property integer $teacher_id
 * @property string $course_name
 * @property integer $school_year_id
 * @property string $is_core
 * @property integer $ed_center_id
 * @property integer $minutes
 * @property string $period
 *
 * @property Attendance[] $attendances
 * @property EdCenter $edCenter
 * @property SchoolYear $schoolYear
 * @property User $teacher
 * @property Download2course[] $download2courses
 * @property IncidentReferral[] $incidentReferrals
 * @property Message2course[] $message2courses
 * @property Message[] $messages
 * @property Section[] $sections
 * @property TeacherPage2course[] $teacherPage2courses
 * @property TeacherPage[] $pages
 * @property Wbl[] $wbls
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'course_name', 'school_year_id', 'is_core', 'ed_center_id'], 'required'],
            [['teacher_id', 'school_year_id', 'ed_center_id', 'minutes'], 'integer'],
            [['is_core', 'period'], 'string'],
            [['course_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'teacher_id' => 'Teacher ID',
            'course_name' => 'Course Name',
            'school_year_id' => 'School Year ID',
            'is_core' => 'Is Core',
            'ed_center_id' => 'Ed Center ID',
            'minutes' => 'Minutes',
            'period' => 'Period',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdCenter()
    {
        return $this->hasOne(EdCenter::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolYear()
    {
        return $this->hasOne(SchoolYear::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['user_id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownload2courses()
    {
        return $this->hasMany(Download2course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentReferrals()
    {
        return $this->hasMany(IncidentReferral::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage2courses()
    {
        return $this->hasMany(Message2course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['message_id' => 'message_id'])->viaTable('message2course', ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['course_id' => 'course_id'])->orderBy('term_id');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherPage2courses()
    {
        return $this->hasMany(TeacherPage2course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(TeacherPage::className(), ['page_id' => 'page_id'])->viaTable('teacher_page2course', ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWbls()
    {
        return $this->hasMany(Wbl::className(), ['course_id' => 'course_id']);
    }

    public static function getTeacherCourseList(){
        $session = Yii::$app->session;
        $query = Course::find();
        $query->joinWith('teacher');
        $query->joinWith('schoolYear'); // teacher & schoolYear are the relations in the course model
        $query->where(['teacher_id'=>$session['user.user_id']]);
        $query->where(['course.school_year_id'=> $session['schoolYears.currentSchoolYear']]);
        $query->orderBy('is_core desc');

        return $query;
    }
}
