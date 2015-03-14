<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_page2course".
 *
 * @property integer $page_id
 * @property integer $course_id
 *
 * @property Course $course
 * @property TeacherPage $page
 */
class TeacherPage2course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_page2course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'course_id'], 'required'],
            [['page_id', 'course_id'], 'integer'],
            [['page_id', 'course_id'], 'unique', 'targetAttribute' => ['page_id', 'course_id'], 'message' => 'The combination of Page ID and Course ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'course_id' => 'Course ID',
        ];
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
    public function getPage()
    {
        return $this->hasOne(TeacherPage::className(), ['page_id' => 'page_id']);
    }
}
