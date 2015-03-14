<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dropbox".
 *
 * @property integer $dropbox_id
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_type
 * @property integer $file_size
 * @property integer $file_owner
 * @property integer $file_recipient
 * @property string $file_title
 * @property string $file_path
 * @property string $file_description
 * @property string $date_dropped
 */
class Dropbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dropbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_id', 'file_owner', 'file_recipient', 'file_path'], 'required'],
            [['file_id', 'file_size', 'file_owner', 'file_recipient'], 'integer'],
            [['file_description'], 'string'],
            [['date_dropped'], 'safe'],
            [['file_name', 'file_type', 'file_title'], 'string', 'max' => 50],
            [['file_path'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dropbox_id' => 'Dropbox ID',
            'file_id' => 'File ID',
            'file_name' => 'File Name',
            'file_type' => 'File Type',
            'file_size' => 'File Size',
            'file_owner' => 'File Owner',
            'file_recipient' => 'File Recipient',
            'file_title' => 'File Title',
            'file_path' => 'File Path',
            'file_description' => 'File Description',
            'date_dropped' => 'Date Dropped',
        ];
    }
}
