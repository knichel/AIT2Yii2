Back Buttons (_form.php & view.php)
<?= Html::a('Back','index', ['class' => 'btn btn-info']) ?>

To simply display related data on a page like views/view.php
	// in columns on the index.php view OR atributes on the view.php view
	'{relationName}.{related_field_name}',
	
To search by related data on the index view
http://www.ramirezcobos.com/2014/04/16/displaying-sorting-and-filtering-model-relations-on-a-gridview-yii2/

	==> On ModelSearch.php
		// at the top of the class These are attribute names used in the views
		public $school; // on User, relating to school
		//add school to the array of "safe" fields
		
		$query = User::find(); //existing
		$query->joinWith('school'); //school = the relation in the Model
		// ONLY ONE MODEL PER LINE for joinWith....

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		// the following allows the sorting in the column if displaying on index
		// school represents the actual table name school_name is the column name
		$dataProvider->sort->attributes['school'] = [
			'asc' => ['school.school_name' => SORT_ASC],
			'desc' => ['school.school_name' => SORT_DESC],
		];

		// $this->school is the relation name
		->andFilterWhere(['like', 'school.school_name', $this->school]) //at bottom of filters

	==> On index.php (view)
	['attribute' => 'school', 'value' => 'school.school_name']

	
To Display a dropDownList on a form like views/_form.php
	// at the top
	use yii\helpers\ArrayHelper; // to create dropDownList
	use app\models\{relatedModel}; // to use relation in dropDownList

	// the use of asArray is ONLY required if using a model fuction
	$listName=ArrayHelper::map({ModelName}::find()->asArray()->all(),'{select_id_field}', '{select_value_field}'); // in the upper section
	// in the form building section
	<?= $form->field($model, '{related_field_id}')->dropDownList({$listName},['prompt'=>'--Choose a {whatever}--']) ?> // to show a dropDownList