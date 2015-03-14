<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $message_id
 * @property integer $user_id
 * @property integer $ed_center_id
 * @property integer $level
 * @property string $start_date
 * @property string $end_date
 * @property string $message
 *
 * @property EdCenter $edCenter
 * @property User $user
 * @property Message2course[] $message2courses
 * @property Course[] $courses
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ed_center_id', 'level', 'start_date', 'end_date', 'message'], 'required'],
            [['user_id', 'ed_center_id', 'level'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['message'], 'string'],
            [['user_id', 'level', 'start_date', 'end_date'], 'unique', 'targetAttribute' => ['user_id', 'level', 'start_date', 'end_date'], 'message' => 'The combination of User ID, Level, Start Date and End Date has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => 'Message ID',
            'user_id' => 'User ID',
            'ed_center_id' => 'Ed Center ID',
            'level' => 'Level',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'message' => 'Message',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdCenter()
    {
        return $this->hasOne(EdCenter::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage2courses()
    {
        return $this->hasMany(Message2course::className(), ['message_id' => 'message_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['course_id' => 'course_id'])->viaTable('message2course', ['message_id' => 'message_id']);
    }
}
