<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property integer $section_id
 * @property integer $category_weight
 * @property integer $category_ord
 *
 * @property Assignment[] $assignments
 * @property Section $section
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'section_id', 'category_weight', 'category_ord'], 'required'],
            [['section_id', 'category_weight', 'category_ord'], 'integer'],
            [['category_name'], 'string', 'max' => 40],
            [['section_id', 'category_ord'], 'unique', 'targetAttribute' => ['section_id', 'category_ord'], 'message' => 'The combination of Section ID and Category Ord has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'section_id' => 'Section ID',
            'category_weight' => 'Category Weight',
            'category_ord' => 'Category Ord',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignment::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['section_id' => 'section_id']);
    }
}
