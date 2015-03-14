<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user2center".
 *
 * @property integer $user_id
 * @property integer $ed_center_id
 * @property string $is_active
 * @property string $is_admin
 * @property string $is_guidance
 * @property string $is_office
 * @property string $is_parent
 * @property string $is_student
 * @property string $is_teacher
 *
 * @property EdCenter $edCenter
 * @property User $user
 */
class User2center extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user2center';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ed_center_id', 'is_active'], 'required'],
            [['user_id', 'ed_center_id'], 'integer'],
            [['is_active', 'is_admin', 'is_guidance', 'is_office', 'is_parent', 'is_student', 'is_teacher'], 'string'],
            [['user_id', 'ed_center_id'], 'unique', 'targetAttribute' => ['user_id', 'ed_center_id'], 'message' => 'The combination of User ID and Ed Center ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'ed_center_id' => 'Ed Center ID',
            'is_active' => 'Is Active',
            'is_admin' => 'Is Admin',
            'is_guidance' => 'Is Guidance',
            'is_office' => 'Is Office',
            'is_parent' => 'Is Parent',
            'is_student' => 'Is Student',
            'is_teacher' => 'Is Teacher',
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
}
