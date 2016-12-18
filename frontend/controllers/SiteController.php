<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
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


use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','index','jobseach','employersregister'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
  /*  public function actionLogin()
    {
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
    }*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    // ------------------- ALL USER(Employers) Start -------------------//
    public function actionEmployerslogin()
    {
        $this->layout='layout';        
        $model=new AllUser();
        if ($model->load(Yii::$app->request->post())) {
            $isverified=$model->find()->where(['Email'=>$model->Email,'VerifyStatus'=>1,'IsDelete'=>0])->count();
            if($isverified==0){
                 Yii::$app->session->setFlash('error', 'Please Check your mail for Email Verification.');
                 return $this->render('employerslogin', ['model' => $model,]);
            }else{
            $password=md5($model->Password);
            $cnt=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'IsDelete'=>0])->count();
            if($cnt>0)
            {
                $rest=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'IsDelete'=>0])->one();
                $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['Employerid']=$rest->UserId;
                Yii::$app->session['EmployerName']=$rest->Name;
                Yii::$app->session['EmployerEmail']=$model->Email;
                
                $employerone=$model->find()->where(['UserId'=>$rest->UserId])->one();
                return $this->render('companyprofile',['employer'=>$employerone]);
            }
            else
            {
                Yii::$app->session->setFlash('error', "Wrong Email Or Password");
                return $this->render('employerslogin', ['model' => $model,]);
            }
        }
        }else {
            return $this->render('employerslogin', ['model' => $model,]);
        }
    }
    
     public function actionEmployersregister()
    {
        $this->layout='layout';
       
        $model=new AllUser();
        $allindustry= ArrayHelper::map(Industry::find()->where(['IsDelete'=>0])->all(),'IndustryId','IndustryName');
        $docmodel=new Documents();
        if ($model->load(Yii::$app->request->post()))
        {
            $count=$model->find()->where(['Email'=>$model->Email,'IsDelete'=>0])->count();
            if($count>0){
                 Yii::$app->session->setFlash('error', "This Emailid Already Exist.");
                 return $this->render('employersregister', ['model' => $model,'industry'=>$allindustry]);
            }else{            
            //var_dump(Yii::$app->request->post());
                $model->UserTypeId=3;
                $model->Password=md5($model->Password);
                $vkey='CB'.time();
                $model->VerifyKey=$vkey;
                $model->Ondate=date('Y-m-d');
                $logo = UploadedFile::getInstance($model, 'LogoId');
                if($logo)
                {
                $logo_id=$docmodel->imageUpload($logo,'LogoId');
                }
                else
                {
                    $logo_id=0;
                }
                $model->LogoId=$logo_id;
                $model->save();
                $name=$model->Name;
                $to=$model->Email;
                $from='Careerbugs@info.in';
                $subject="Verify your email id";
                
               $html= "<html>
               <head>
               <title>Verify your email id</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/jyoti/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/jyoti/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear  $name, </h3>
                Just click the button below (it only takes a couple of seconds). You won’t be asked to log in as its simply a verification of the ownership of this email address.
               <br/>
               </span>
               </h2>
               </td>
               </tr>
               <tr>
                <td><a href='http://45.58.34.139/jyoti/frontend/web/index.php?r=site%2Femployersverifryemail&vkey=$vkey'>
               <span style='display: block;color: #ffffff;text-decoration: none;font-size: 14px;text-align: center;font-family: 'Open Sans',Gill Sans,Arial,Helvetica,sans-serif;font-weight: bold;line-height: 45px;'>Verify Email</span>
               </a></td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
               Yii::$app->session->setFlash('success', 'Check your email for EmailId Verification.');
               return $this->render('index');
        }
           
        }else{            
            return $this->render('employersregister', ['model' => $model,'industry'=>$allindustry]);
        }
    }
    public function actionEmployersverifryemail($vkey)
    {
        $this->layout='layout';
        $alluser=new AllUser();
        $userone=$alluser->find()->select(['VerifyStatus'])->where(['VerifyKey'=>$vkey])->one();
        if($userone->VerifyStatus==0)
        {
        $userone->VerifyStatus=1;
        $userone->save();
        Yii::$app->session->setFlash('success', 'Account Verified Successfully, Now You Can Login Through Using Login Credential');
        }
        else
        {
          Yii::$app->session->setFlash('error', 'Already Verified');  
        }
        return $this->redirect(['employerslogin']);
    }
     public function actionCompanyprofileupdate()
    {
        $this->layout='layout';
        $alluser=new AllUser();
       
    }
    public function actionCheckemail($email)
    {
        $model = new AllUser();
        $count=$model->find()->where(['Email'=>$email,'IsDelete'=>0])->count();
        if($count>0){
            echo "NOTOK";
        }else{
            echo "OK";
        }
     }
      public function actionYourpost()
    {
        $this->layout='layout';
        return $this->render('yourpost');
    }
    
     public function actionPostajob()
    {
        $this->layout='layout';
        return $this->render('postajob');
    }
    
     public function actionEmployerlogout()
    {
        
        $session = Yii::$app->session;
        $session->open();
        unset(Yii::$app->session['Employerid']);
        unset(Yii::$app->session['EmployerName']);
        unset(Yii::$app->session['EmployerEmail']);
        return $this->render('index');
    }
    
    // ------------------- ALL USER(Employers) End -------------------//
    
    public function actionJobsearch()
    {
        $this->layout='layout';
        return $this->render('jobsearch');
    }
    
    public function actionHirecandidate()
    {
        $this->layout='layout';
        return $this->render('hirecandidate');
    }
    
    public function actionJobseekersregister()
    {
        $this->layout='layout';
        $skill=new Skill();
        $position=new Position();
        $course=new Course();
        $alluser=new AllUser();
        $docmodel=new Documents();
        
        $allskill=$skill->find()->where("IsDelete=0")->all();
        
        $allposition=$position->find()->where("IsDelete=0")->all();
        
        $allcourse=$course->find()->where("IsDelete=0")->all();
        
        if ($alluser->load(Yii::$app->request->post())) {
            $cv = UploadedFile::getInstance($alluser, 'CVId');
            if($cv)
            {
            $cv_id=$docmodel->imageUpload($cv,'CVId');
            }
            else
            {
                $cv_id=0;
            }
            $alluser->UserTypeId=2;
            $alluser->EntryType='Experience';
            $alluser->Password=md5(Yii::$app->request->post()['AllUser']['Password']);
            $alluser->CVId=$cv_id;
            $alluser->Ondate=date('Y-m-d');
            $alluser->save();
            
            $education=new Education;
            $education->UserId=$alluser->UserId;
            $education->HighestQualification=Yii::$app->request->post()['AllUser']['HighestQualification'];
            $education->CourseId=Yii::$app->request->post()['AllUser']['CourseId'];
            $education->University=Yii::$app->request->post()['AllUser']['University'];
            $education->PassingYear=Yii::$app->request->post()['AllUser']['DurationTo'];
            $education->SkillId=Yii::$app->request->post()['AllUser']['SkillId'];
            $education->DurationFrom=Yii::$app->request->post()['AllUser']['DurationFrom'];
            $education->DurationTo=Yii::$app->request->post()['AllUser']['DurationTo'];
            $education->OnDate=date('Y-m-d');
            $education->save();
            
            if(Yii::$app->request->post()['AllUser']['CompanyName']!='')
            {
            $experience=new Experience();
            $experience->UserId=$alluser->UserId;
            $experience->CompanyName=Yii::$app->request->post()['AllUser']['CompanyName'];
            $experience->PositionId=Yii::$app->request->post()['AllUser']['PositionId'];
            $experience->YearFrom=Yii::$app->request->post()['AllUser']['YearFrom'];
            $experience->YearTo=Yii::$app->request->post()['AllUser']['YearTo'];
            $experience->Experience=Yii::$app->request->post()['AllUser']['Experience'];
            $experience->Salary=Yii::$app->request->post()['AllUser']['Salary'];
            $experience->OnDate=date('Y-m-d');
            $experience->save();
            }
            
                $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['EmployeeEmail']=$alluser->Email;
                Yii::$app->session['Employeeid']=$alluser->UserId;
                Yii::$app->session['EmployeeName']=$alluser->Name;
                return $this->redirect(['profilepage']);
        }
        else{
            return $this->render('jobseekersregister',['skill'=>$allskill,'position'=>$allposition,'course'=>$allcourse]);
        }
        
    }
    
    
   
    
    public function actionLogin()
    {
        //$this->layout='layout';
        return $this->render('login');
    }
    
   
    
    public function actionEmployeeforgetpassword()
    {
        $this->layout='layout';
        return $this->render('employeeforgetpassword');
    }
    
    public function actionForgetpassword()
    {
        $this->layout='layout';
        return $this->render('forgetpassword');
    }
    
    public function actionRegister()
    {
        $this->layout='layout';
        return $this->render('register');
    }
    
    public function actionSearchcandidate()
    {
        $this->layout='layout';
        return $this->render('searchcandidate');
    }
        

    
    public function actionProfilepage()
    {
        $this->layout='layout';
        return $this->render('profilepage');
    }
    
    
}
