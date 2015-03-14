<?php

namespace app\controllers;

use Yii;
use app\models\Grade;
use app\models\GradeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradeController implements the CRUD actions for Grade model.
 */
class GradeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Grade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GradeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grade model.
     * @param integer $student_id
     * @param integer $assignment_id
     * @return mixed
     */
    public function actionView($student_id, $assignment_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($student_id, $assignment_id),
        ]);
    }

    /**
     * Creates a new Grade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Grade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'assignment_id' => $model->assignment_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Grade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $student_id
     * @param integer $assignment_id
     * @return mixed
     */
    public function actionUpdate($student_id, $assignment_id)
    {
        $model = $this->findModel($student_id, $assignment_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'assignment_id' => $model->assignment_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Grade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $student_id
     * @param integer $assignment_id
     * @return mixed
     */
    public function actionDelete($student_id, $assignment_id)
    {
        $this->findModel($student_id, $assignment_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $student_id
     * @param integer $assignment_id
     * @return Grade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id, $assignment_id)
    {
        if (($model = Grade::findOne(['student_id' => $student_id, 'assignment_id' => $assignment_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
