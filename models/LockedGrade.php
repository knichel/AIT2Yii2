<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locked_grade".
 *
 * @property integer $student_id
 * @property integer $section_id
 * @property string $locked_grade
 */
class LockedGrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locked_grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'section_id', 'locked_grade'], 'required'],
            [['student_id', 'section_id'], 'integer'],
            [['locked_grade'], 'string', 'max' => 20],
            [['student_id', 'section_id'], 'unique', 'targetAttribute' => ['student_id', 'section_id'], 'message' => 'The combination of Student ID and Section ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'section_id' => 'Section ID',
            'locked_grade' => 'Locked Grade',
        ];
    }
}
