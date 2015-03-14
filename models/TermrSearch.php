<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Term;

/**
 * TermrSearch represents the model behind the search form about `app\models\Term`.
 */
class TermrSearch extends Term
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_id', 'school_id', 'ed_center_id', 'school_year_id', 'term_weight', 'term_ord'], 'integer'],
            [['term_name', 'term_start_date', 'term_end_date', 'smsName', 'interims_due_date', 'grades_due_date'], 'safe'],
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
        $query = Term::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'term_id' => $this->term_id,
            'school_id' => $this->school_id,
            'ed_center_id' => $this->ed_center_id,
            'school_year_id' => $this->school_year_id,
            'term_weight' => $this->term_weight,
            'term_start_date' => $this->term_start_date,
            'term_end_date' => $this->term_end_date,
            'term_ord' => $this->term_ord,
            'interims_due_date' => $this->interims_due_date,
            'grades_due_date' => $this->grades_due_date,
        ]);

        $query->andFilterWhere(['like', 'term_name', $this->term_name])
            ->andFilterWhere(['like', 'smsName', $this->smsName]);

        return $dataProvider;
    }
}
