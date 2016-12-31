<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;

use common\models\AllUser;
use common\models\Industry;
use common\models\UserType;
use yii\heleprs\Url;


use common\models\Skill;
use common\models\Course;
use common\models\Position;
use common\models\Documents;
use common\models\Education;
use common\models\Experience;
use common\models\ContactUs;
use common\models\PostJob;
use common\models\JobCategory;
use common\models\JobRelatedSkill;
use common\models\NewsLetter;

use yii\filters\AccessControl;
use common\components\AccessRule;
/**
 * Site controller
 */
class SiteController extends Controller
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

                        'actions' => ['login','index', 'error','alljob','deletejob','allemployee','deleteemployee','allemployer','deleteemployer','newslettersubscriber','deletenews','topjob'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('home');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout='login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionAlljob()
    {
        $model = new PostJob();
        $alljob = $model->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
        return $this->render('alljob', [
                'model' => $alljob,
            ]);
    }
    
    public function actionTopjob($id,$tpjob)
    {
        $model = new PostJob();
        $job = $model->find()->where(['JobId'=>$id])->one();
        if($tpjob==1)
        {
            $tjb=0;
        }
        else{
            $tjb=1;
        }
        $job->TopJob=$tjb;
        $job->save();      
        echo json_encode(1);
    }
    
    public function actionDeletejob($id)
    {
        $model = new PostJob();
        $job = $model->find()->where(['JobId'=>$id])->one();
        $job->IsDelete=1;
        $job->save();      
        return $this->redirect(['alljob']);
    }

    
    public function actionAllemployee()
    {
        $model = new AllUser();
        $allemployee = $model->find()->where(['IsDelete'=>0,'UserTypeId'=>2])->orderBy(['Ondate'=>SORT_DESC])->all();
        
        return $this->render('allemployee', [
                'model' => $allemployee,
            ]);
    }
    
    public function actionDeleteemployee($id)
    {
        $model = new AllUser();
        $employee = $model->find()->where(['UserId'=>$id])->one();
        $employee->IsDelete=1;
        $employee->save();      
        return $this->redirect(['allemployee']);
    }
    
    public function actionAllemployer()
    {
        $model = new AllUser();
        $allemployer = $model->find()->where(['IsDelete'=>0,'UserTypeId'=>3])->orderBy(['OnDate'=>SORT_DESC])->all();
        
        return $this->render('allemployer', [
                'model' => $allemployer,
            ]);
    }
    public function actionDeleteemployer($id)
    {
        $model = new AllUser();
        $employer = $model->find()->where(['UserId'=>$id])->one();
        $employer->IsDelete=1;
        $employer->save();   
        return $this->redirect(['allemployer']);
    }
    
    public function actionNewslettersubscriber()
    {
        $news=new NewsLetter();
        $allnewsletter=$news->find()->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
        return $this->render('newslettersubscriber',['allnews'=>$allnewsletter]);
    }
    
    public function actionDeletenews($id)
    {
        $news=new NewsLetter();
        $newsone=$news->find()->where(['NewsLetterId'=>$id])->one();
        $newsone->IsDelete=1;
        if($newsone->save())
        {
            Yii::$app->session->setFlash('success', 'Email Deleted Succesfully');
        }
        else
        {
            Yii::$app->session->setFlash('error', 'There is some error , please try again');
        }
        
        return $this->redirect(['newslettersubscriber']);
    }
    
}
