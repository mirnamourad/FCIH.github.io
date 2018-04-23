<?php

namespace backend\controllers;

use backend\models\Students;
use Yii;
use backend\models\Results;
use backend\models\ResultsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultsController implements the CRUD actions for Results model.
 */
class ResultsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Results models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResultsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Results model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReview()
    {
        $resultss = array();
        $query = Students::find()->where(['userid'=>$_SESSION['user_id']]);
        foreach ($query->all() as $studentID) {
            $usertype = $studentID['id'];
        }
        $rquery = Results::find()->where(['student_id'=>$usertype]);
        $test = $rquery->createCommand()->getRawSql();
        $test2 = $rquery->all();
        //print_r($rquery);


        return $this->render('review', array('test2'=>$test2));
    }

    /**
     * Creates a new Results model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Results();

        if ($model->load(Yii::$app->request->post())) {

            $grades = intval($model->grade);
            if ($grades >= 50){
                $model->status = 'Success';
            }

            if ($grades < 50){
                $model->status = 'Failed';
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Results model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Results model.
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
     * Finds the Results model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Results the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Results::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
