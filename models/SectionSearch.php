<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Section;

/**
 * SectionSearch represents the model behind the search form about `app\models\Section`.
 */
class SectionSearch extends Section
{
    public $termName;
    public $courseName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'term_id', 'course_id'], 'integer'],
            [['created_date', 'is_core', 'termName', 'courseName'], 'safe'],
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
        $query = Section::find();
        $query->joinWith('term');
        $query->joinWith('course');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['termName'] = [
            'asc' => ['term.term_name' => SORT_ASC],
			'desc' => ['term.term_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['courseName'] = [
            'asc' => ['course.course_name' => SORT_ASC],
			'desc' => ['course.course_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'section_id' => $this->section_id,
            'created_date' => $this->created_date,
            //'term_id' => $this->term_id,
            //'course_id' => $this->course_id,
        ]);

        $query->andFilterWhere(['like', 'is_core', $this->is_core])
            ->andFilterWhere(['like','course.course_name', $this->courseName])
            ->andFilterWhere(['like','term.term_name', $this->termName]);

        return $dataProvider;
    }
}
