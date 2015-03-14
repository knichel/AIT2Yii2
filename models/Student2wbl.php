<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student2wbl".
 *
 * @property integer $student_id
 * @property integer $wbl_id
 *
 * @property User $student
 * @property Wbl $wbl
 */
class Student2wbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student2wbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'wbl_id'], 'required'],
            [['student_id', 'wbl_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'wbl_id' => 'Wbl ID',
        ];
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
    public function getWbl()
    {
        return $this->hasOne(Wbl::className(), ['wbl_id' => 'wbl_id']);
    }
}
