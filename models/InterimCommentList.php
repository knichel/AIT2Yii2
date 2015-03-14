<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interim_comment_list".
 *
 * @property integer $comment_id
 * @property integer $building_id
 * @property string $category
 * @property integer $sort_order
 * @property string $item_text
 */
class InterimCommentList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interim_comment_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['building_id', 'category', 'sort_order', 'item_text'], 'required'],
            [['building_id', 'sort_order'], 'integer'],
            [['category'], 'string', 'max' => 20],
            [['item_text'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'building_id' => 'Building ID',
            'category' => 'Category',
            'sort_order' => 'Sort Order',
            'item_text' => 'Item Text',
        ];
    }
}
