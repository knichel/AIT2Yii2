<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $school_id
 * @property string $school_name
 * @property string $attend_officer
 * @property string $attend_email
 * @property integer $ed_center_id
 * @property string $phone
 *
 * @property EdCenter $edCenter
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attend_officer', 'attend_email'], 'required'],
            [['ed_center_id'], 'integer'],
            [['attend_email'],'email'],
            [['school_name'], 'string', 'max' => 40],
            [['attend_officer', 'attend_email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'school_id' => 'School ID',
            'school_name' => 'School Name',
            'attend_officer' => 'Attend Officer',
            'attend_email' => 'Attend Email',
            'ed_center_id' => 'Ed Center',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdCenter()
    {
        return $this->hasOne(EdCenter::className(), ['ed_center_id' => 'ed_center_id']);
    }
}
