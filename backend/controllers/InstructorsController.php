<?php

namespace backend\controllers;

use Yii;
use backend\models\Instructors;
use backend\models\Users;
use backend\models\InstructorsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstructorsController implements the CRUD actions for Instructors model.
 */
class InstructorsController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout =  'main';
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
     * Lists all Instructors models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
        $searchModel = new InstructorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Instructors model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Instructors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
        $model = new Instructors();
        $us    = new Users();
        $conn = Yii::$app->getDb();

        if ($model->load(Yii::$app->request->post())) {
            $us->fullname = $model->instructorname;
            $us->emailaddress = $model->instructoremail;
            $us->password = sha1($model->instructorpassword);
            $model->instructorpassword = sha1($model->instructorpassword);
            $us->username = $model->instructoremail;
            $us->usertype = 3;
            if ($us->save()){
                $command = $conn->createCommand('select * from users order by id desc limit 1');
                $result = $command->queryAll();
                foreach ($result as $studentID){
                    $model->userid = $studentID['id'];
                }
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Instructors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
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
     * Deletes an existing Instructors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Instructors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instructors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (isset($_SESSION['user_type']) != 3 || isset($_SESSION['user_type']) != 1){
            return $this->redirect(['/site/index']);
        }
        if (($model = Instructors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
