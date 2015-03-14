<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_page".
 *
 * @property integer $page_id
 * @property integer $teacher_id
 * @property string $link_name
 * @property string $description
 *
 * @property User $teacher
 * @property TeacherPage2course[] $teacherPage2courses
 * @property Course[] $courses
 */
class TeacherPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'link_name'], 'required'],
            [['teacher_id'], 'integer'],
            [['description'], 'string'],
            [['link_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'teacher_id' => 'Teacher ID',
            'link_name' => 'Link Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['user_id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherPage2courses()
    {
        return $this->hasMany(TeacherPage2course::className(), ['page_id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['course_id' => 'course_id'])->viaTable('teacher_page2course', ['page_id' => 'page_id']);
    }
}
