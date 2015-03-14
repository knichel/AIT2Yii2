<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $link_id
 * @property string $cat
 * @property string $description
 * @property integer $ord
 * @property string $for_admin
 * @property string $for_guidance
 * @property string $for_parent
 * @property string $for_student
 * @property string $for_teacher
 * @property string $for_gradebook
 * @property string $for_office
 * @property string $is_active
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat', 'description', 'ord'], 'required'],
            [['ord'], 'integer'],
            [['for_admin', 'for_guidance', 'for_parent', 'for_student', 'for_teacher', 'for_gradebook', 'for_office', 'is_active'], 'string'],
            [['cat'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'link_id' => 'Link ID',
            'cat' => 'Cat',
            'description' => 'Description',
            'ord' => 'Ord',
            'for_admin' => 'For Admin',
            'for_guidance' => 'For Guidance',
            'for_parent' => 'For Parent',
            'for_student' => 'For Student',
            'for_teacher' => 'For Teacher',
            'for_gradebook' => 'For Gradebook',
            'for_office' => 'For Office',
            'is_active' => 'Is Active',
        ];
    }
}
