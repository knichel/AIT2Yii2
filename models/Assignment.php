<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property integer $assignment_id
 * @property string $assignment_name
 * @property integer $category_id
 * @property string $due_date
 * @property integer $max_score
 * @property double $assignment_weight
 * @property string $assignment_note
 * @property string $is_extra_credit
 *
 * @property Category $category
 * @property Grade[] $grades
 * @property User[] $students
 */
class Assignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assignment_name', 'category_id', 'due_date', 'max_score', 'assignment_weight'], 'required'],
            [['category_id', 'max_score'], 'integer'],
            [['due_date'], 'safe'],
            [['assignment_weight'], 'number'],
            [['is_extra_credit'], 'string'],
            [['assignment_name'], 'string', 'max' => 40],
            [['assignment_note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'assignment_id' => 'Assignment ID',
            'assignment_name' => 'Assignment Name',
            'category_id' => 'Category ID',
            'due_date' => 'Due Date',
            'max_score' => 'Max Score',
            'assignment_weight' => 'Assignment Weight',
            'assignment_note' => 'Assignment Note',
            'is_extra_credit' => 'Is Extra Credit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['assignment_id' => 'assignment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(User::className(), ['user_id' => 'student_id'])->viaTable('grade', ['assignment_id' => 'assignment_id']);
    }
}
