<?php

namespace backend\controllers;

use backend\models\Users;
use Yii;
use backend\models\Students;
use backend\models\StudentsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
            return $this->redirect(['/site/index']);
        }
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
            return $this->redirect(['/site/index']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
            return $this->redirect(['/site/index']);
        }
        $model = new Students();
        $us    = new Users();
        $conn = Yii::$app->getDb();

        if ($model->load(Yii::$app->request->post())) {
            $us->fullname = $model->studentname;
            $us->emailaddress = $model->studentemail;
            $us->password = sha1($model->studentpassword);
            $model->studentpassword = sha1($model->studentpassword);
            $us->username = $model->studentemail;
            $us->usertype = 2;
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
                'us' => $us,
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
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
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
            return $this->redirect(['/site/index']);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (isset($_SESSION['user_type']) != 1 || isset($_SESSION['user_type']) != 3){
            return $this->redirect(['/site/index']);
        }
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
