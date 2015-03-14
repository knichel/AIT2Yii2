<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\School;

/**
 * SchoolSearch represents the model behind the search form about `app\models\School`.
 */
class SchoolSearch extends School
{
    public $edCenter;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'ed_center_id'], 'integer'],
            [['school_name', 'attend_officer', 'attend_email', 'phone', 'edCenter'], 'safe'],
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
        $query = School::find();
        $query->joinWith(['edCenter']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['edCenter'] = [
            'asc' => ['ed_center.ed_center_name' => SORT_ASC],
            'desc' => ['ed_center.ed_center_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'school_id' => $this->school_id,
            'ed_center_id' => $this->ed_center_id,
        ]);

        $query->andFilterWhere(['like', 'school_name', $this->school_name])
            ->andFilterWhere(['like', 'school.attend_officer', $this->attend_officer])
            ->andFilterWhere(['like', 'school.attend_email', $this->attend_email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'ed_center.ed_center_name', $this->edCenter]);

        return $dataProvider;
    }
}
