<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ed_center".
 *
 * @property integer $ed_center_id
 * @property string $ed_center_name
 * @property string $short_name
 * @property string $attend_officer
 * @property string $attend_email
 * @property integer $sms_building_id
 *
 * @property Course[] $courses
 * @property Download[] $downloads
 * @property Message[] $messages
 * @property School[] $schools
 * @property Term[] $terms
 * @property User2center[] $user2centers
 * @property User[] $users
 */
class EdCenter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ed_center';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ed_center_name', 'short_name', 'attend_officer', 'attend_email', 'sms_building_id'], 'required'],
            [['sms_building_id'], 'integer'],
            [['ed_center_name', 'attend_email'], 'string', 'max' => 40],
            [['short_name'], 'string', 'max' => 5],
            [['attend_officer'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ed_center_id' => 'Ed Center ID',
            'ed_center_name' => 'Ed Center Name',
            'short_name' => 'Short Name',
            'attend_officer' => 'Attend Officer',
            'attend_email' => 'Attend Email',
            'sms_building_id' => 'Sms Building ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(Download::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Term::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2centers()
    {
        return $this->hasMany(User2center::className(), ['ed_center_id' => 'ed_center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_id' => 'user_id'])->viaTable('user2center', ['ed_center_id' => 'ed_center_id']);
    }
}
