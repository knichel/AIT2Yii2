<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form about `app\models\Category`.
 */
class CategorySearch extends Category
{
    public $section;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'section_id', 'category_weight', 'category_ord'], 'integer'],
            [['category_name', 'section'], 'safe'],
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
        $query = Category::find();
        $query->joinWith('section');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['section'] = [
            'asc' => ['section.course.course_name' => SORT_ASC],
			'desc' => ['section.course.course_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'category_id' => $this->category_id,
            'section_id' => $this->section_id,
            'category_weight' => $this->category_weight,
            'category_ord' => $this->category_ord,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
                ->andFilterWhere(['like','course.course_name', $this->section]);

        return $dataProvider;
    }
}
