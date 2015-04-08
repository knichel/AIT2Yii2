<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\CurrentSchoolYear;
use app\models\LoginForm;
use app\models\SchoolYear;
use app\models\Term;
use app\models\User;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Session;

class SiteController extends Controller {
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['login', 'logout'],
				'rules' => [
					[
						'allow' => true,
						'actions' => ['login'],
						'roles' => ['?'],
					],
					[
						//'actions' => ['login','logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					//'logout' => ['post'],
				],
			],
		];
	}

	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionIndex() {
		//if(!\Yii::$app->user->isGuest){
		return $this->render('index');
		/*
	}else{
	$model = new LoginForm();
	return $this->render('login', [
	'model' => $model,
	]);
	}
	 *
	 */
	}

	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			// get the users user_id and set some session vars....
			$userID = Yii::$app->user->getId();
			$userInfo = User::findOne($userID)->getAttributes();
			foreach ($userInfo as $key => $val) {
				Yii::$app->session->set('user.' . $key, $val);
			}
			// set the school years list for schoolYearSwitcher
			$years = SchoolYear::find()
				->where('school_year_id > 0')
				->orderBy('school_year_id desc')
				->all();
			foreach ($years as $year) {
				$syl[$year['school_year_id']] = [
					'school_year_id' => $year['school_year_id'],
					'school_year_description' => $year['school_year_description'],
				];
				Yii::$app->session->set('schoolYears.schoolYearsArray', $syl);
			}
			// set the current school year to 9 for testing...
			//Yii::$app->session->set('schoolYears.currentSchoolYear', '9');
			$year = CurrentSchoolYear::find()->where('current_year_id > 0')->one();
			echo "<pre>";
			echo var_dump($year);
			echo "</pre>";
			//exit;
			$currentYear = $year->current_year_id;
			Yii::$app->session->set('schoolYears.currentSchoolYear', $currentYear);

			// set the terms for the current school year
			$terms = Term::find()
				->where(['school_year_id' => $currentYear])
				->orderBy('term_ord asc')
				->all();
			foreach ($terms as $term) {
				$thisYearTerms[$term['term_id']] = $term['term_name'];
			}

			Yii::$app->session->set('thisYearTerms', $thisYearTerms);
			return $this->goBack();
		} else {
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->goHome();
	}

	public function actionContact() {
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		} else {
			return $this->render('contact', [
				'model' => $model,
			]);
		}
	}

	public function actionAbout() {
		return $this->render('about');
	}
}
