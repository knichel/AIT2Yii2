<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "download".
 *
 * @property integer $download_id
 * @property integer $teacher_id
 * @property integer $ed_center_id
 * @property string $filename
 * @property string $description
 * @property integer $size
 * @property string $file_type
 * @property string $title
 * @property string $date_upload
 *
 * @property EdCenter $edCenter
 * @property User $teacher
 * @property Download2course[] $download2courses
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'ed_center_id', 'filename', 'description', 'size', 'file_type', 'title'], 'required'],
            [['teacher_id', 'ed_center_id', 'size'], 'integer'],
            [['description'], 'string'],
            [['date_upload'], 'safe'],
            [['filename'], 'string', 'max' => 70],
            [['file_type', 'title'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'download_id' => 'Download ID',
            'teacher_id' => 'Teacher ID',
            'ed_center_id' => 'Ed Center ID',
            'filename' => 'Filename',
            'description' => 'Description',
            'size' => 'Size',
            'file_type' => 'File Type',
            'title' => 'Title',
            'date_upload' => 'Date Upload',
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
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['user_id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownload2courses()
    {
        return $this->hasMany(Download2course::className(), ['download_id' => 'download_id']);
    }
}
