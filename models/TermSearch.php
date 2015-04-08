<?php

namespace app\models;
use Yii;
use app\models\Term;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TermSearch represents the model behind the search form about `app\models\Term`.
 */
class TermSearch extends Term {
	public $edCenter;
	public $schoolYear;
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['term_id', 'ed_center_id', 'school_year_id', 'term_weight', 'term_ord'], 'integer'],
			[['term_name', 'term_start_date', 'term_end_date', 'smsName', 'interims_due_date', 'grades_due_date', 'edCenter', 'schoolYear'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
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
	public function search($params) {
        $session = Yii::$app->session;
		$query = Term::find();
		$query->joinWith('edCenter');
		$query->joinWith('schoolYear');
		$query->where(['term.school_year_id' => $session['schoolYears.currentSchoolYear']]);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		$dataProvider->sort->attributes['edCenter'] = [
			'asc' => ['ed_center.ed_center_name' => SORT_ASC],
			'desc' => ['ed_center.ed_center_name' => SORT_DESC],
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
			'term_id' => $this->term_id,
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
			->andFilterWhere(['like', 'school_year.school_year_description', $this->schoolYear])
			->andFilterWhere(['like', 'ed_center.ed_center_name', $this->edCenter]);

		return $dataProvider;
	}
}
