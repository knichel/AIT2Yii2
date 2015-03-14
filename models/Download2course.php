<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "download2course".
 *
 * @property integer $download_id
 * @property integer $course_id
 *
 * @property Course $course
 * @property Download $download
 */
class Download2course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download2course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['download_id', 'course_id'], 'required'],
            [['download_id', 'course_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'download_id' => 'Download ID',
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
    public function getDownload()
    {
        return $this->hasOne(Download::className(), ['download_id' => 'download_id']);
    }
}
