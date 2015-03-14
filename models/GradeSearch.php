<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grade;

/**
 * GradeSearch represents the model behind the search form about `app\models\Grade`.
 */
class GradeSearch extends Grade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'assignment_id'], 'integer'],
            [['raw_score', 'comment'], 'safe'],
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
        $query = Grade::find();

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
            'student_id' => $this->student_id,
            'assignment_id' => $this->assignment_id,
        ]);

        $query->andFilterWhere(['like', 'raw_score', $this->raw_score])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
