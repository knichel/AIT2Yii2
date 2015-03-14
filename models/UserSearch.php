<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    public $school;
    public $secretQuestion;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'secret_question1', 'secret_question2', 'grade_level', 'school_id', 'created_by'], 'integer'],
            [['username', 'first_name', 'last_name', 'password', 'email', 'send_attend_email', 'secret_answer1', 'secret_answer2', 'is_active', 'phone', 'address1', 'address2', 'city', 'state', 'zip', 'pass_change_code', 'weekly_progress', 'created_date', 'parent_link_code', 'last_login','school', 'secretQuestion'], 'safe'],
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
        $query = User::find();
        $query->joinWith('school','secretQuestion');
        //$query->joinWith('secretQuestion');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['school'] = [
            'asc' => ['school.school_name' => SORT_ASC],
            'desc' => ['school.school_name' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'secret_question1' => $this->secret_question1,
            'secret_question2' => $this->secret_question2,
            'grade_level' => $this->grade_level,
            'school_id' => $this->school_id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'last_login' => $this->last_login,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'send_attend_email', $this->send_attend_email])
            ->andFilterWhere(['like', 'secret_answer1', $this->secret_answer1])
            ->andFilterWhere(['like', 'secret_answer2', $this->secret_answer2])
            ->andFilterWhere(['like', 'is_active', $this->is_active])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'pass_change_code', $this->pass_change_code])
            ->andFilterWhere(['like', 'weekly_progress', $this->weekly_progress])
            ->andFilterWhere(['like', 'parent_link_code', $this->parent_link_code])
            ->andFilterWhere(['like', 'school.school_name', $this->school]);

        return $dataProvider;
    }
}
