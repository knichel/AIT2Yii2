<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_year".
 *
 * @property integer $school_year_id
 * @property string $school_year_description
 * @property string $start_date
 * @property string $end_date
 *
 * @property Attendance[] $attendances
 * @property Course[] $courses
 * @property CustomScore[] $customScores
 * @property IncidentReferral[] $incidentReferrals
 * @property Term[] $terms
 * @property Wbl[] $wbls
 */
class SchoolYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_year_description', 'start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['school_year_description'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'school_year_id' => 'School Year ID',
            'school_year_description' => 'School Year',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomScores()
    {
        return $this->hasMany(CustomScore::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentReferrals()
    {
        return $this->hasMany(IncidentReferral::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Term::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWbls()
    {
        return $this->hasMany(Wbl::className(), ['school_year_id' => 'school_year_id']);
    }
}
