<?php

namespace backend\controllers;

use Yii;
use common\models\JobCategory;
use common\models\JobCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use common\components\AccessRule;
/**
 * JobCategoryController implements the CRUD actions for JobCategory model.
 */
class JobCategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                    [

                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JobCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobCategory model.
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
     * Creates a new JobCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JobCategory();

        if ($model->load(Yii::$app->request->post())) {
            $model->OnDate=date('Y-m-d');
            if($model->save())
            {
                Yii::$app->session->setFlash('success', "JobCategory Created Successfully");
            }
            else
            {
                Yii::$app->session->setFlash('error', "There is some error Please try again");
            }
            return $this->redirect(['create']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JobCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save())
            {
                Yii::$app->session->setFlash('success', "JobCategory Updated Successfully");
                return $this->redirect(['index']);
            }
            else
            {
                Yii::$app->session->setFlash('error', "There is some error Please try again");
                return $this->refresh();
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JobCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->IsDelete=1;
       if($model->save())
            {
                Yii::$app->session->setFlash('success', "JobCategory Deleted Successfully");
            }
            else
            {
                Yii::$app->session->setFlash('success', "There is some error please try again");
            }

        return $this->redirect(['index']);
    }

    /**
     * Finds the JobCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JobCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JobCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
