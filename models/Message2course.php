<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message2course".
 *
 * @property integer $message_id
 * @property integer $course_id
 *
 * @property Course $course
 * @property Message $message
 */
class Message2course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message2course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'course_id'], 'required'],
            [['message_id', 'course_id'], 'integer'],
            [['message_id', 'course_id'], 'unique', 'targetAttribute' => ['message_id', 'course_id'], 'message' => 'The combination of Message ID and Course ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => 'Message ID',
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
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['message_id' => 'message_id']);
    }
}
