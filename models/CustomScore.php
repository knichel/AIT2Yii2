<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "custom_score".
 *
 * @property integer $custom_score_id
 * @property integer $teacher_id
 * @property integer $school_year_id
 * @property string $code
 * @property string $long_name
 * @property integer $grade
 *
 * @property SchoolYear $schoolYear
 * @property User $teacher
 */
class CustomScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'school_year_id', 'code', 'long_name'], 'required'],
            [['teacher_id', 'school_year_id', 'grade'], 'integer'],
            [['code'], 'string', 'max' => 5],
            [['long_name'], 'string', 'max' => 30],
            [['teacher_id', 'school_year_id', 'code'], 'unique', 'targetAttribute' => ['teacher_id', 'school_year_id', 'code'], 'message' => 'The combination of Teacher ID, School Year ID and Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'custom_score_id' => 'Custom Score ID',
            'teacher_id' => 'Teacher ID',
            'school_year_id' => 'School Year ID',
            'code' => 'Code',
            'long_name' => 'Long Name',
            'grade' => 'Grade',
        ];
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
}
