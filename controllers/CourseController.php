<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Course;
use app\models\Section;
use app\models\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\session;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $terms = Yii::$app->request->post('termsList');
            if($model->save()){
                $courseID = $model->course_id;
                foreach($terms as $termID){
                    $section = new Section();
                    $section->course_id = $courseID;
                    $section->term_id = $termID;
                    $section->save(false);
                }
            }
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'selected'=> [],
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $currentTerms = [];
        foreach($model->sections as $section){
            $currentTerms[] = $section->term_id;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // terms selected by user from post
            $futureTerms = Yii::$app->request->post('termsList');
            
            $insertTerms = array_diff($futureTerms,$currentTerms);
            $removeTerms = array_diff($currentTerms,$futureTerms);

            if($model->save()){
                $courseID = $model->course_id;
                foreach($insertTerms as $termID){
                    $section = new Section();
                    $section->course_id = $courseID;
                    $section->term_id = $termID;
                    $section->save(false);
                }
                foreach($removeTerms as $termID){
                    $section = Section::find()->where(['course_id'=>$courseID,'term_id'=>$termID])->one();
                    $section->delete();
                }
            }
            
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'selected'=>$currentTerms,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
