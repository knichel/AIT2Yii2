<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incident_referral".
 *
 * @property integer $incident_referral_id
 * @property integer $teacher_id
 * @property integer $student_id
 * @property integer $section_id
 * @property integer $course_id
 * @property integer $school_year_id
 * @property string $referral_date
 * @property string $referral_time
 * @property string $teach_refer_desc
 * @property string $teach_incident_notes
 * @property string $teach_refer_warn
 * @property string $teach_refer_warn_date
 * @property string $teach_refer_conf
 * @property string $teach_refer_conf_date
 * @property string $teach_refer_phone
 * @property string $teach_refer_phone_date
 * @property string $teach_action_notes
 * @property string $teach_refer_action
 * @property string $teach_refer_action_date
 * @property string $admin_action_notes
 * @property string $admin_refer_phone
 * @property string $admin_refer_phone_date
 * @property string $admin_refer_suspension
 * @property string $admin_refer_suspension_type
 * @property string $admin_refer_suspension_start_date
 * @property string $admin_refer_suspension_end_date
 * @property string $admin_refer_pconf
 * @property string $admin_refer_pconf_date
 * @property string $admin_refer_other
 * @property string $admin_refer_other_date
 * @property string $admin_refer_guid
 * @property string $admin_refer_guid_date
 * @property string $admin_refer_conf_notes
 * @property string $isClosed
 *
 * @property Section $section
 * @property Course $course
 * @property SchoolYear $schoolYear
 * @property User $student
 * @property User $teacher
 */
class IncidentReferral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incident_referral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'student_id', 'section_id', 'course_id', 'school_year_id'], 'required'],
            [['teacher_id', 'student_id', 'section_id', 'course_id', 'school_year_id'], 'integer'],
            [['referral_date', 'referral_time', 'teach_refer_warn_date', 'teach_refer_conf_date', 'teach_refer_phone_date', 'teach_refer_action_date', 'admin_refer_phone_date', 'admin_refer_suspension_start_date', 'admin_refer_suspension_end_date', 'admin_refer_pconf_date', 'admin_refer_other_date', 'admin_refer_guid_date'], 'safe'],
            [['teach_incident_notes', 'teach_refer_warn', 'teach_refer_conf', 'teach_refer_phone', 'teach_action_notes', 'teach_refer_action', 'admin_action_notes', 'admin_refer_phone', 'admin_refer_suspension', 'admin_refer_suspension_type', 'admin_refer_pconf', 'admin_refer_other', 'admin_refer_guid', 'admin_refer_conf_notes', 'isClosed'], 'string'],
            [['teach_refer_desc'], 'string', 'max' => 100],
            [['student_id', 'section_id', 'referral_date'], 'unique', 'targetAttribute' => ['student_id', 'section_id', 'referral_date'], 'message' => 'The combination of Student ID, Section ID and Referral Date has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incident_referral_id' => 'Incident Referral ID',
            'teacher_id' => 'Teacher ID',
            'student_id' => 'Student ID',
            'section_id' => 'Section ID',
            'course_id' => 'Course ID',
            'school_year_id' => 'School Year ID',
            'referral_date' => 'Referral Date',
            'referral_time' => 'Referral Time',
            'teach_refer_desc' => 'Teach Refer Desc',
            'teach_incident_notes' => 'Teach Incident Notes',
            'teach_refer_warn' => 'Teach Refer Warn',
            'teach_refer_warn_date' => 'Teach Refer Warn Date',
            'teach_refer_conf' => 'Teach Refer Conf',
            'teach_refer_conf_date' => 'Teach Refer Conf Date',
            'teach_refer_phone' => 'Teach Refer Phone',
            'teach_refer_phone_date' => 'Teach Refer Phone Date',
            'teach_action_notes' => 'Teach Action Notes',
            'teach_refer_action' => 'Teach Refer Action',
            'teach_refer_action_date' => 'Teach Refer Action Date',
            'admin_action_notes' => 'Admin Action Notes',
            'admin_refer_phone' => 'Admin Refer Phone',
            'admin_refer_phone_date' => 'Admin Refer Phone Date',
            'admin_refer_suspension' => 'Admin Refer Suspension',
            'admin_refer_suspension_type' => 'Admin Refer Suspension Type',
            'admin_refer_suspension_start_date' => 'Admin Refer Suspension Start Date',
            'admin_refer_suspension_end_date' => 'Admin Refer Suspension End Date',
            'admin_refer_pconf' => 'Admin Refer Pconf',
            'admin_refer_pconf_date' => 'Admin Refer Pconf Date',
            'admin_refer_other' => 'Admin Refer Other',
            'admin_refer_other_date' => 'Admin Refer Other Date',
            'admin_refer_guid' => 'Admin Refer Guid',
            'admin_refer_guid_date' => 'Admin Refer Guid Date',
            'admin_refer_conf_notes' => 'Admin Refer Conf Notes',
            'isClosed' => 'Is Closed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['section_id' => 'section_id']);
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
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['user_id' => 'teacher_id']);
    }
}
