<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property integer $student_id
 * @property integer $assignment_id
 * @property string $raw_score
 * @property string $comment
 *
 * @property Assignment $assignment
 * @property User $student
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'assignment_id'], 'required'],
            [['student_id', 'assignment_id'], 'integer'],
            [['raw_score'], 'string', 'max' => 5],
            [['comment'], 'string', 'max' => 200],
            [['student_id', 'assignment_id'], 'unique', 'targetAttribute' => ['student_id', 'assignment_id'], 'message' => 'The combination of Student ID and Assignment ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'assignment_id' => 'Assignment ID',
            'raw_score' => 'Raw Score',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignment()
    {
        return $this->hasOne(Assignment::className(), ['assignment_id' => 'assignment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['user_id' => 'student_id']);
    }
}
