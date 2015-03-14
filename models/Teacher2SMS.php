<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher2SMS".
 *
 * @property integer $user_id
 * @property string $smsUID
 *
 * @property User $user
 */
class Teacher2SMS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher2SMS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'smsUID'], 'required'],
            [['user_id'], 'integer'],
            [['smsUID'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'smsUID' => 'Sms Uid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
