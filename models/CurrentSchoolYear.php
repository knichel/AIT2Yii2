<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "current_school_year".
 *
 * @property integer $current_year_id
 */
class CurrentSchoolYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'current_school_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['current_year_id'], 'required'],
            [['current_year_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'current_year_id' => 'Current Year ID',
        ];
    }
}
