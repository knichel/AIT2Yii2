<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parent2student".
 *
 * @property integer $parent_id
 * @property integer $student_id
 *
 * @property User $parent
 * @property User $student
 */
class Parent2student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parent2student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'student_id'], 'required'],
            [['parent_id', 'student_id'], 'integer'],
            [['parent_id', 'student_id'], 'unique', 'targetAttribute' => ['parent_id', 'student_id'], 'message' => 'The combination of Parent ID and Student ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent_id' => 'Parent ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(User::className(), ['user_id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['user_id' => 'student_id']);
    }
}
