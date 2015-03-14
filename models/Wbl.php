<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wbl".
 *
 * @property integer $wbl_id
 * @property string $date
 * @property string $type
 * @property integer $school_year_id
 * @property integer $course_id
 * @property string $job
 * @property string $contact
 * @property string $location
 * @property integer $minutes
 *
 * @property Student2wbl[] $student2wbls
 * @property Course $course
 * @property SchoolYear $schoolYear
 */
class Wbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['type'], 'string'],
            [['school_year_id', 'course_id'], 'required'],
            [['school_year_id', 'course_id', 'minutes'], 'integer'],
            [['job'], 'string', 'max' => 200],
            [['contact', 'location'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wbl_id' => 'Wbl ID',
            'date' => 'Date',
            'type' => 'Type',
            'school_year_id' => 'School Year ID',
            'course_id' => 'Course ID',
            'job' => 'Job',
            'contact' => 'Contact',
            'location' => 'Location',
            'minutes' => 'Minutes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent2wbls()
    {
        return $this->hasMany(Student2wbl::className(), ['wbl_id' => 'wbl_id']);
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
