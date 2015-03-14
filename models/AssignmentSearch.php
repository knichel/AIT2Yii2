<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assignment;

/**
 * AssignmentSearch represents the model behind the search form about `app\models\Assignment`.
 */
class AssignmentSearch extends Assignment
{
    public $category;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assignment_id', 'category_id', 'max_score'], 'integer'],
            [['assignment_name', 'due_date', 'assignment_note', 'is_extra_credit','category'], 'safe'],
            [['assignment_weight'], 'number'],
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
        $query = Assignment::find();
        $query->joinWith('category');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['category'] = [
            'asc' => ['category.category_name' => SORT_ASC],
			'desc' => ['category.category_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'assignment_id' => $this->assignment_id,
            'category_id' => $this->category_id,
            'due_date' => $this->due_date,
            'max_score' => $this->max_score,
            'assignment_weight' => $this->assignment_weight,
        ]);

        $query->andFilterWhere(['like', 'assignment_name', $this->assignment_name])
            ->andFilterWhere(['like', 'assignment_note', $this->assignment_note])
            ->andFilterWhere(['like', 'is_extra_credit', $this->is_extra_credit])
            ->andFilterWhere(['like','category.category_name', $this->category]);

        return $dataProvider;
    }
}
