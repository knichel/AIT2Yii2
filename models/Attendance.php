<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property integer $student_id
 * @property string $date
 * @property string $status
 * @property string $time
 * @property integer $school_year_id
 * @property integer $course_id
 * @property string $note
 * @property integer $minutes
 *
 * @property User $student
 * @property Course $course
 * @property SchoolYear $schoolYear
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'date', 'school_year_id', 'course_id'], 'required'],
            [['student_id', 'school_year_id', 'course_id', 'minutes'], 'integer'],
            [['date', 'time'], 'safe'],
            [['status'], 'string'],
            [['note'], 'string', 'max' => 100],
            [['student_id', 'date', 'course_id'], 'unique', 'targetAttribute' => ['student_id', 'date', 'course_id'], 'message' => 'The combination of Student ID, Date and Course ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'date' => 'Date',
            'status' => 'Status',
            'time' => 'Time',
            'school_year_id' => 'School Year ID',
            'course_id' => 'Course ID',
            'note' => 'Note',
            'minutes' => 'Minutes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['user_id' => 'student_id']);
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
    public function getSchoolYear()
    {
        return $this->hasOne(SchoolYear::className(), ['school_year_id' => 'school_year_id']);
    }
}
