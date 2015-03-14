<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $comment_id
 * @property integer $section_id
 * @property integer $student_id
 * @property string $interim_quality
 * @property string $interim_improvement
 * @property string $interim_comment
 * @property string $grade_comment
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
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
}
