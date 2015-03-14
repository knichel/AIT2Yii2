<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $comment_id
 * @property integer $section_id
 * @property integer $student_id
 * @property string $interim_quality
 * @property string $interim_improvement
 * @property string $interim_comment
 * @property string $grade_comment
 *
 * @property Section $section
 * @property User $student
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'student_id', 'interim_quality', 'interim_improvement', 'interim_comment', 'grade_comment'], 'required'],
            [['section_id', 'student_id'], 'integer'],
            [['interim_quality', 'interim_improvement', 'interim_comment', 'grade_comment'], 'string'],
            [['section_id', 'student_id'], 'unique', 'targetAttribute' => ['section_id', 'student_id'], 'message' => 'The combination of Section ID and Student ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'section_id' => 'Section ID',
            'student_id' => 'Student ID',
            'interim_quality' => 'Interim Quality',
            'interim_improvement' => 'Interim Improvement',
            'interim_comment' => 'Interim Comment',
            'grade_comment' => 'Grade Comment',
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
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['user_id' => 'student_id']);
    }
}
