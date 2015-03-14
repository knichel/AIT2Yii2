<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secret_question".
 *
 * @property integer $secret_question_id
 * @property string $question
 *
 * @property User[] $users
 */
class SecretQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secret_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['secret_question_text'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'secret_question_id' => 'Secret Question ID',
            'secret_question_text' => 'Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['secret_question' => 'secret_question_id']);
    }
}
