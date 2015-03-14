<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdCenter;

/**
 * EdCenterSearch represents the model behind the search form about `app\models\EdCenter`.
 */
class EdCenterSearch extends EdCenter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ed_center_id', 'sms_building_id'], 'integer'],
            [['ed_center_name', 'short_name', 'attend_officer', 'attend_email'], 'safe'],
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
        $query = EdCenter::find();

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
            'ed_center_id' => $this->ed_center_id,
            'sms_building_id' => $this->sms_building_id,
        ]);

        $query->andFilterWhere(['like', 'ed_center_name', $this->ed_center_name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'attend_officer', $this->attend_officer])
            ->andFilterWhere(['like', 'attend_email', $this->attend_email]);

        return $dataProvider;
    }
}
