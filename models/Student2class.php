<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student2class".
 *
 * @property integer $user_id
 * @property integer $section_id
 * @property string $is_active
 *
 * @property Section $section
 * @property User $user
 */
class Student2class extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student2class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'section_id'], 'required'],
            [['user_id', 'section_id'], 'integer'],
            [['is_active'], 'string'],
            [['user_id', 'section_id'], 'unique', 'targetAttribute' => ['user_id', 'section_id'], 'message' => 'The combination of User ID and Section ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'section_id' => 'Section ID',
            'is_active' => 'Is Active',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
