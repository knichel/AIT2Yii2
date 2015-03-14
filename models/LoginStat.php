<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_stat".
 *
 * @property integer $user_id
 * @property string $date
 * @property string $ip
 */
class LoginStat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['ip'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'date' => 'Date',
            'ip' => 'Ip',
        ];
    }
}
