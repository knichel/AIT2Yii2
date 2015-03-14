<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "term".
 *
 * @property integer $term_id
 * @property integer $ed_center_id
 * @property integer $school_year_id
 * @property string $term_name
 * @property integer $term_weight
 * @property string $term_start_date
 * @property string $term_end_date
 * @property integer $term_ord
 * @property string $smsName
 * @property string $interims_due_date
 * @property string $grades_due_date
 *
 * @property Section[] $sections
 * @property EdCenter $edCenter
 * @property SchoolYear $schoolYear
 */
class Term extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ed_center_id', 'school_year_id', 'term_name', 'term_weight', 'term_start_date', 'term_end_date', 'term_ord', 'interims_due_date', 'grades_due_date'], 'required'],
            [['ed_center_id', 'school_year_id', 'term_weight', 'term_ord'], 'integer'],
            [['term_start_date', 'term_end_date', 'interims_due_date', 'grades_due_date'], 'safe'],
            [['term_name'], 'string', 'max' => 30],
            [['term_ord', 'ed_center_id', 'school_year_id'], 'unique', 'targetAttribute' => ['term_ord', 'ed_center_id', 'school_year_id'], 'message' => 'The combination of Ed Center ID, School Year ID and Term Ord has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'term_id' => 'Term ID',
            'ed_center_id' => 'Ed Center ID',
            'school_year_id' => 'School Year ID',
            'term_name' => 'Term Name',
            'term_weight' => 'Term Weight',
            'term_start_date' => 'Term Start Date',
            'term_end_date' => 'Term End Date',
            'term_ord' => 'Term Ord',
            'smsName' => 'Sms Name',
            'interims_due_date' => 'Interims Due Date',
            'grades_due_date' => 'Grades Due Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['term_id' => 'term_id']);
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
    public function getSchoolYear()
    {
        return $this->hasOne(SchoolYear::className(), ['school_year_id' => 'school_year_id']);
    }
}
