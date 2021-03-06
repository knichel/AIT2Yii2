<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;


/**
 * CourseSearch represents the model behind the search form about `app\models\Course`.
 */
class CourseSearch extends Course
{
    public $teacherFirst; 
    public $teacherLast;
    public $schoolYear;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'teacher_id', 'school_year_id', 'ed_center_id', 'minutes'], 'integer'],
            [['course_name', 'is_core', 'period','teacherFirst','teacherLast','schoolYear'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // moved query to Course model
        $query = Course::getTeacherCourseList();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['teacherFirst'] = [
            'asc' => ['user.first_name' => SORT_ASC],
			'desc' => ['user.first_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['teacherLast'] = [
            'asc' => ['user.last_name' => SORT_ASC],
			'desc' => ['user.last_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['schoolYear'] = [
            'asc' => ['school_year.school_year_description' => SORT_ASC],
			'desc' => ['school_year.school_year_description' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'course_id' => $this->course_id,
            'teacher_id' => $this->teacher_id,
            'school_year_id' => $this->school_year_id,
            'ed_center_id' => $this->ed_center_id,
            'minutes' => $this->minutes,
        ]);

        $query->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'is_core', $this->is_core])
            ->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like','user.first_name', $this->teacherFirst])
            ->andFilterWhere(['like','user.last_name', $this->teacherLast])
            ->andFilterWhere(['like','school_year.school_year_description', $this->schoolYear]);

        return $dataProvider;
    }
}
