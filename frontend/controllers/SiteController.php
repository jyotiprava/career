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
use common\models\ContactUs;
use common\models\PostJob;
use common\models\JobCategory;
use common\models\JobRelatedSkill;
use common\models\NewsLetter;
use common\models\AppliedJob;

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
                        'actions' => ['signup','index','jobseach','employersregister','companyprofileeditpage','resetpassword','applyjob'],
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
        $postjob=new PostJob();
        //Recent Job
        $alljob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
        
        //Top Job
        $topjob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(5)->all();
        
        //hot categories
        $hotcategory=$postjob->find()->select(['count(*) as cnt','JobCategory.CategoryName as CategoryName','JobCategory.JobCategoryId as JobCategoryId'])->joinWith(['jobCategory'])->where(['PostJob.IsDelete'=>0,'Jobstatus'=>0])->groupBy(['PostJob.JobCategoryId'])->all();
        
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //companies who posted job
        $companylogo=$postjob->find()->select(['CompanyName','LogoId','Website'])->groupBy(['CompanyName'])->all();
        
        $this->layout='main';
        
        return $this->render('index',['alljob'=>$alljob,'topjob'=>$topjob,'hotcategory'=>$hotcategory,'allcompany'=>$companylogo]);
    }
    
    public function actionJobdetail()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $JobId=Yii::$app->request->get()['JobId'];
        $postjob=new PostJob();
        $postdetail=$postjob->find()->where(['JobId'=>$JobId,'JobStatus'=>0])->one();
        return $this->render('jobdetail',['allpost'=>$postdetail]);
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
        $model = new ContactUs();
        $contactname=Yii::$app->request->get()['contact_name'];
        $contactnumber=Yii::$app->request->get()['contact_number'];
        $contactemail=Yii::$app->request->get()['contact_email'];
        $contactfrom=Yii::$app->request->get()['contactfrom'];
        $contactmessage=Yii::$app->request->get()['contact_message'];
        $model->ContactNumber=$contactnumber;
        $model->Email=$contactemail;
        $model->ContactFrom=$contactfrom;
        $model->Message=$contactmessage;
        $model->Name=$contactname;
        $model->OnDate=date('Y-m-d');
        if($model->save())
        {
            $msg='Thank you for contacting us. We will respond to you as soon as possible.';
            
            $to=$model->Email;
                $from=Yii::$app->params['adminEmail'];
                $subject="Thank you";
                
               $html= "<html>
               <head>
               <title>Thank you</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear  $contactname, </h3>
Thank you for contacting us. We will respond to you as soon as possible.!
               <br/>
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
        }
        else
        {
            $msg='There was an error sending email.';
        }
       echo json_encode($msg); 
    }
    
    public function actionNewsletter()
    {
        $model = new NewsLetter();
        $news_email=Yii::$app->request->get()['news_email'];
        $cnt=$model->find()->where(['Email'=>$news_email])->one();
        if($cnt)
        {
            $msg="You have already signup for News Letter with this email";
        }
        else
        {
            $model->Email=$news_email;
            $model->IsDelete=0;
            $model->OnDate=date('Y-m-d');
            if($model->save())
            {
                
                $to=$model->Email;
                $from=Yii::$app->params['adminEmail'];
                $subject="News Letter";
                
               $html= "<html>
               <head>
               <title>News Letter</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear , $to</h3>
Thank you for connecting with us.
               <br/>
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
               
                $msg="Successfully Signup For News Letter";
            }
            else
            {
                $msg="There is some error please try again";
            }
        }
        
        echo json_encode($msg);
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
    // ------------------- ALL USER(Employers) Start -------------------//
    public function actionEmployerslogin()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
        
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';        
        $model=new AllUser();
        if ($model->load(Yii::$app->request->post())) {
            $password=md5($model->Password);
            $rest=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'UserTypeId'=>3,'IsDelete'=>0])->one();
            
            if($rest)
            {
                if($rest->VerifyStatus==0)
                {
                    Yii::$app->session->setFlash('error', 'Please Check your mail for Email Verification.');
                    return $this->render('employerslogin', ['model' => $model,]);
                }
                else
                {
                $rest=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'UserTypeId'=>3,'IsDelete'=>0])->one();
                $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['Employerid']=$rest->UserId;
                Yii::$app->session['EmployerName']=$rest->Name;
                Yii::$app->session['EmployerEmail']=$model->Email;
                
                $employerone=$model->find()->where(['UserId'=>$rest->UserId])->one();
                
                if($employerone->LogoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$employerone->logo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
                Yii::$app->session['EmployerDP']=$pimage;
        
                return $this->render('companyprofile',['employer'=>$employerone]);
                }
            }
            else
            {
                Yii::$app->session->setFlash('error', "Wrong Email Or Password");
                return $this->render('employerslogin', ['model' => $model,]);
            }
        }else {
            return $this->render('employerslogin', ['model' => $model,]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionEmployersregister()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
        
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
       
        $model=new AllUser();
        $allindustry= ArrayHelper::map(Industry::find()->where(['IsDelete'=>0])->all(),'IndustryId','IndustryName');
        $docmodel=new Documents();
        if ($model->load(Yii::$app->request->post()))
        {
            $count=$model->find()->where(['Email'=>$model->Email,'IsDelete'=>0,'UserTypeId'=>3])->count();
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
                $from=Yii::$app->params['adminEmail'];;
                $subject="Verify your email id";
                
               $html= "<html>
               <head>
               <title>Verify your email id</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
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
                <td><a href='http://45.58.34.139/career/frontend/web/index.php?r=site%2Femployersverifryemail&vkey=$vkey'>
               <span style='display: block; height:50 px;width:100px;color: #ffffff;text-decoration: none;font-size: 14px;text-align: center;font-family: 'Open Sans',Gill Sans,Arial,Helvetica,sans-serif;font-weight: bold;line-height: 45px;'>Verify Email</span>
               </a></td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
               Yii::$app->session->setFlash('success', 'Check your email for EmailId Verification.');
               return $this->redirect(['index']);
        } 
        }else{            
            return $this->render('employersregister', ['model' => $model,'industry'=>$allindustry]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionEmployersverifryemail($vkey)
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $alluser=new AllUser();
        $userone=$alluser->find()->where(['VerifyKey'=>$vkey])->one();
        if($userone)
        {
        if($userone->VerifyStatus==0)
        {
        $userone->VerifyStatus=1;
        $userone->save();
        
        $name=$userone->Name;
        $to=$userone->Email;
                
                $from=Yii::$app->params['adminEmail'];
                $subject="Registration Success";
                
               $html= "<html>
               <head>
               <title>Registration Success</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear  $name, </h3>
                    Congratulations! You have been registered successfully on Careerbug!!
               <br/>
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
        
        
        Yii::$app->session->setFlash('success', 'Account Verified Successfully, Now You Can Login Through Using Login Credential');
        }
        else
        {
          Yii::$app->session->setFlash('error', 'Already Verified');  
        }
        }
        else
        {
            Yii::$app->session->setFlash('error', 'Wrong Activation link');  
        }
        return $this->redirect(['employerslogin']);
    }
    
    public function actionEmployeeverifyemail($vkey)
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $alluser=new AllUser();
        $userone=$alluser->find()->where(['VerifyKey'=>$vkey])->one();
        if($userone)
        {
        if($userone->VerifyStatus==0)
        {
        $userone->VerifyStatus=1;
        $userone->save();
        
        
        $name=$userone->Name;
        $to=$userone->Email;
                
                $from=Yii::$app->params['adminEmail'];
                $subject="Registration Success";
                
               $html= "<html>
               <head>
               <title>Registration Success</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear  $name, </h3>
                    Congratulations! You have been registered successfully on Careerbug!!
               <br/>
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
        
        
        
        
        Yii::$app->session->setFlash('success', 'Account Verified Successfully, Now You Can Login Through Using Login Credential');
        }
        else
        {
          Yii::$app->session->setFlash('error', 'Already Verified');  
        }
        }
        else
        {
            Yii::$app->session->setFlash('error', 'Wrong Activation link');  
        }
        return $this->redirect(['login']);
    }
    
    public function actionCompanyprofile()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
            $jobcategory=new JobCategory();
            $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
            Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $model=new AllUser();
        $employerid= Yii::$app->session['Employerid'];
        $employerone=$model->find()->where(['UserId'=>$employerid])->one();
        return $this->render('companyprofile',['employer'=>$employerone]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    public function actionCompanyprofileeditpage()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $model=new AllUser();
        $allindustry= ArrayHelper::map(Industry::find()->where(['IsDelete'=>0])->all(),'IndustryId','IndustryName');
        $docmodel=new Documents();        
        $employerid= Yii::$app->session['Employerid'];
        $employerone=$model->find()->where(['UserId'=>$employerid])->one();
        $oldlogo=$employerone->LogoId;
        if($employerone->load(Yii::$app->request->post())){
            $logo = UploadedFile::getInstance($model, 'LogoId');
                if($logo)
                {
                $logo_id=$docmodel->imageUpload($logo,'LogoId');
                }
                else
                {
                    $logo_id=$oldlogo;
                }
              $employerone->LogoId=$logo_id;
              $employerone->save();
              if($employerone->LogoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$employerone->logo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
                Yii::$app->session['EmployerDP']=$pimage;
           
            Yii::$app->session->setFlash('success', 'Profile Updated Successfully.');
            return $this->redirect(['companyprofile']);           

        }else{
            return $this->render('editcompanyprofilepage',['employer'=>$employerone,'industry'=>$allindustry]);
        }
        
    }

    public function actionYourpost()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
            $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
            $this->layout='layout';
            $postjob=new PostJob();
            $allpost=$postjob->find()->where(['EmployerId'=>Yii::$app->session['Employerid']])->orderBy(['OnDate'=>SORT_DESC])->all();
            return $this->render('yourpost',['allpost'=>$allpost]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionPostdetail($JobId)
    {
        if(isset(Yii::$app->session['Employerid']))
        {
            $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        
            $this->layout='layout';
            $postjob=new PostJob();
            $allpost=$postjob->find()->where(['EmployerId'=>Yii::$app->session['Employerid'],'JobId'=>$JobId])->one();
            return $this->render('postdetail',['allpost'=>$allpost]);
        }
        else
        {
            return $this->redirect(['index']);
        }        
    }
    
    public function actionClosestatus()
    {
        $jobid=Yii::$app->request->get()['jobid'];
        $postjob=new PostJob();
        $pdetail=$postjob->find()->where(['JobId'=>$jobid])->one();
        $pdetail->JobStatus=1;
        if($pdetail->save())
        {
           $msg="Job Closed Successfully";
        }
        else
        {
            $msg="There is some error please try again";
        }
        
        echo json_encode($msg); 
    }
    
    public function actionPostajob()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        
        $this->layout='layout';
        $postajob=new PostJob();
        $position=new Position();
        $jobcategory=new JobCategory();
        $docmodel=new Documents();
        $alluser=new Alluser();
        
        $employerd=$alluser->find()->select(['MobileNo','Email'])->where(['UserId'=>Yii::$app->session['Employerid']])->one();
        
        $allposition=$position->find()->where("IsDelete=0")->all();
        $allcategory=$jobcategory->find()->where("IsDelete=0")->all();
        
        
        if ($postajob->load(Yii::$app->request->post())) {
            $logo = UploadedFile::getInstance($postajob, 'LogoId');
            if($logo)
            {
            $logo_id=$docmodel->imageUpload($logo,'CompanyLogo');
            }
            else
            {
                $logo_id=0;
            }
            $postajob->LogoId=$logo_id;
            $postajob->EmployerId=Yii::$app->session['Employerid'];
            $postajob->OnDate=date('Y-m-d h:i:s');
            $postajob->save();
            
            $skill=explode(",",Yii::$app->request->post()['PostJob']['KeySkill']);
            foreach($skill as $key=>$value)
            {
                if($value!='')
                {
                $jobrelatedskill=new JobRelatedSkill();
                $jobrelatedskill->JobId=$postajob->JobId;
                $jobrelatedskill->SkillId=$value;
                $jobrelatedskill->OnDate=date('Y-m-d');
                $jobrelatedskill->save();
                }
            }
            Yii::$app->session->setFlash('success', 'Job Post Successfully');
            return $this->redirect(['yourpost']);
        }
        else
        {
        return $this->render('postajob',['model'=>$postajob,'position'=>$allposition,'jobcategory'=>$allcategory,'empd'=>$employerd]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionSkill()
    {
        $skill=new Skill();
        $searchTerm = Yii::$app->request->get()['term'];
        $allskill=$skill->find()->where(['IsDelete'=>0])->andWhere(['LIKE', 'Skill', $searchTerm])->all();
        
        $data=array();
        foreach($allskill as $key=>$value)
        {
            $data[]=array('id'=>$value->SkillId,'value'=>$value->Skill);
        }
        
        echo json_encode($data);
    }
    
    public function actionEmployerlogout()
    {  
        $session = Yii::$app->session;
        $session->open();
        unset(Yii::$app->session['Employerid']);
        unset(Yii::$app->session['EmployerName']);
        unset(Yii::$app->session['EmployerEmail']);
        return $this->redirect(['index']);
    }
    
    // ------------------- ALL USER(Employers) End -------------------//
    
    public function actionJobsearch()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $postjob=new PostJob();
        
        //All Job
        if(isset(Yii::$app->request->get()['JobCategoryId']))
        {
        $alljob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0,'JobCategoryId'=>Yii::$app->request->get()['JobCategoryId']])->orderBy(['OnDate'=>SORT_DESC])->all();
        }
        else
        {
        $alljob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
        }
        
        //hot categories
        $hotcategory=$postjob->find()->select(['count(*) as cnt','JobCategory.CategoryName as CategoryName','JobCategory.JobCategoryId'])->joinWith(['jobCategory'])->where(['PostJob.IsDelete'=>0,'Jobstatus'=>0])->groupBy(['PostJob.JobCategoryId'])->all();
        return $this->render('jobsearch',['alljob'=>$alljob,'hotcategory'=>$hotcategory]);
    }
    
    public function actionHirecandidate()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        return $this->render('hirecandidate');
    }
    
    public function actionJobseekersregister()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
        
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
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
            $count=$alluser->find()->where(['Email'=>$alluser->Email,'IsDelete'=>0,'UserTypeId'=>2])->count();
            if($count>0){
                 Yii::$app->session->setFlash('error', "This Emailid Already Exist.");
                 return $this->render('jobseekersregister',['skill'=>$allskill,'position'=>$allposition,'course'=>$allcourse]);
            }else{

            $cv = UploadedFile::getInstance($alluser, 'CVId');
            if($cv)
            {
            $cv_id=$docmodel->imageUpload($cv,'CVId');
            }
            else
            {
                $cv_id=0;
            }
            
            $photo = UploadedFile::getInstance($alluser, 'PhotoId');
            if($photo)
            {
            $photo_id=$docmodel->imageUpload($photo,'PhotoId');
            }
            else
            {
                $photo_id=0;
            }
            
            $alluser->UserTypeId=2;
            if(Yii::$app->request->post()['AllUser']['CompanyName']!='')
            {
            $alluser->EntryType='Experience';
            }
            else
            {
            $alluser->EntryType='Fresher';    
            }
            $alluser->Password=md5(Yii::$app->request->post()['AllUser']['Password']);
            $alluser->CVId=$cv_id;
            $alluser->PhotoId=$photo_id;
            $alluser->Ondate=date('Y-m-d');
            $vkey='CB'.time();
            $alluser->VerifyKey=$vkey;
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
            

                
                $name=$alluser->Name;
                $to=$alluser->Email;
                $from=Yii::$app->params['adminEmail'];
                $subject="Please confirm your Careerbug account.";
                
               $html= "<html>
               <head>
               <title>Please confirm your Careerbug account.</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear  $name, </h3>
You need to confirm your email address $to in order to activate your Careerbug account, Activating your account will give you more benefits and better control.
               <br/>
               </span>
               <br/>
               <h3 style='font-size:18px;'>Please click the link below to confirm your account.</h3>
               </h2>
               </td>
               </tr>
                <tr>
                <td><a href='http://45.58.34.139/career/frontend/web/index.php?r=site%2Femployeeverifyemail&vkey=$vkey'>
               <span style='display: block;color: #ffffff;text-decoration: none;font-size: 14px;text-align: center;font-family: 'Open Sans',Gill Sans,Arial,Helvetica,sans-serif;font-weight: bold;line-height: 45px;'>Verify Email</span>
               </a></td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
               $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
                
                
                
                
                Yii::$app->session->setFlash('success', "Account Created Successfully");
                return $this->redirect(['profilepage']);
            }
        }
        else{
            return $this->render('jobseekersregister',['skill'=>$allskill,'position'=>$allposition,'course'=>$allcourse]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    
   
    
    public function actionLogin()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
          $model=new AllUser();
         if ($model->load(Yii::$app->request->post())){
            $password=md5($model->Password);
            $rest=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'UserTypeId'=>2,'IsDelete'=>0])->one();
            if($rest)
            {
                if($rest->VerifyStatus==0)
                {
                    Yii::$app->session->setFlash('error', 'Please Check your mail for Email Verification.');
                    return $this->render('login', ['model' => $model,]);
                }
                else
                {
                $this->layout='layout';
                $rest=$model->find()->where(['Email'=>$model->Email,'Password'=>$password,'UserTypeId'=>2,'IsDelete'=>0])->one();
                $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['Employeeid']=$rest->UserId;
                Yii::$app->session['EmployeeName']=$rest->Name;
                Yii::$app->session['EmployeeEmail']=$model->Email;
                if($rest->PhotoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$rest->photo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
                Yii::$app->session['EmployeeDP']=$pimage;
                return $this->redirect(['profilepage']);
                }
            }
            else
            {
                Yii::$app->session->setFlash('error', "Wrong Email Or Password");
                return $this->render('login', ['model' => $model,]);
            }
        }else{
            return $this->render('login', ['model' => $model,]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionEmployeelogout()
    {
        $session = Yii::$app->session;
        $session->open();
        unset(Yii::$app->session['Employeeid']);
        unset(Yii::$app->session['EmployeeName']);
        unset(Yii::$app->session['EmployeeEmail']);
        return $this->redirect(['index']);
    }
    
    
    public function actionEmployerforgetpassword()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $model = new AllUser();
        if ($model->load(Yii::$app->request->post())) {
            $email=Yii::$app->request->post('AllUser')['Email'];
            $chk=$model->find()->where(['Email'=>$email,'UserTypeId'=>3])->one();
         if($chk)
         {
                $ucode='CB'.time();
                $chk->VerifyKey=$ucode;
                $chk->ForgotStatus=0;
                $chk->save();
                
               // var_dump($chk->getErrors());
                
                $to=$email;
                $from='careerbugs@info.in';
                $subject="Reset Password";
                
               $html= "<html>
               <head>
               <title>Create a new password</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:150px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
               Please click in the link to create your new password
               <br/>
               <a href='http://45.58.34.139/career/frontend/web/index.php?r=site%2Fresetpassword&ucode=$ucode'>
               <span style='display: block; height:50 px;width:100px;color: #ffffff;text-decoration: none;font-size: 14px;text-align: center;font-family: 'Open Sans',Gill Sans,Arial,Helvetica,sans-serif;font-weight: bold;line-height: 45px;'>Click Here</span>
               </a>
              
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
                $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
               Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
         }
         else
         {
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
         }
        }

       return $this->render('employerforgetpassword',['model' => $model]);
    }
    
      public function actionResetpassword($ucode)
    {
        $model = new AllUser();
        $chk=$model->find()->where(['VerifyKey'=>$ucode,'UserTypeId'=>3])->one();
        
        if ($model->load(Yii::$app->request->post())) {
            $chk->Password=md5($model->Password);
            $chk->save();
            Yii::$app->session->setFlash('success', 'New password has been saved.');
            return $this->redirect(['employerslogin']);
            }
            else
            {
                if( $chk)
                {
                    if($chk->ForgotStatus==0)
                    {
                    $chk->ForgotStatus=1;
                    $chk->save();
                    return $this->render('resetpassword', ['ucode'=>$ucode,'model' => $model,]);
                    }
                    else
                    {
                        Yii::$app->session->setFlash('error', 'Your reset password link expired');
                    }
                }
                else{
                    Yii::$app->session->setFlash('success', 'Please give your registered EmailId for create a new password.');
                     return $this->redirect(['employerforgetpassword']); 
                }
            }
    }
    public function actionEmployerchangepassword()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $model = new AllUser();
        
        if ($model->load(Yii::$app->request->post())) {
            $cpass=md5(Yii::$app->request->post('AllUser')['CPassword']);
            $npass=Yii::$app->request->post('AllUser')['NPassword'];
            $UserId=Yii::$app->request->post('AllUser')['UserId'];
            $chk=$model->find()->where(['UserId'=>$UserId])->one();
            if($chk->Password==$cpass){
            $chk->Password=md5($npass);
            $chk->save();
            Yii::$app->session->setFlash('success', 'Password Has been Changed.');
            return $this->redirect(['companyprofile']); 
            
            }else{
            Yii::$app->session->setFlash('error', 'Incorrect Current Password.');
            return $this->render('employerchangepassword', ['model'=>$model]); 
            }
            
            }
            else
            {
                return $this->render('employerchangepassword', ['model'=>$model]); 
               
            }
    }
    public function actionForgetpassword()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        $model = new AllUser();
        if ($model->load(Yii::$app->request->post())) {
          $email=Yii::$app->request->post('AllUser')['Email'];
            $chk=$model->find()->where(['Email'=>$email,'UserTypeId'=>2])->one();
         if($chk)
         {
                $ucode='CB'.time();
                $chk->VerifyKey=$ucode;
                $chk->ForgotStatus=0;               
                $chk->save();
                
                //var_dump($chk->getErrors());
                
                $to=$email;
                $from='careerbugs@info.in';
                $subject="Reset Password";
                
               $html= "<html>
               <head>
               <title>Create a new password</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/career/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:150px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/career/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
               Please click in the link to create your new password
               <br/>
               <a href='http://45.58.34.139/career/frontend/web/index.php?r=site%2Fresetemppassword&ucode=$ucode'>
               <span style='display: block; height:50 px;width:100px;color: #ffffff;text-decoration: none;font-size: 14px;text-align: center;font-family: 'Open Sans',Gill Sans,Arial,Helvetica,sans-serif;font-weight: bold;line-height: 45px;'>Click Here</span>
               </a>
              
               </span>
               </h2>
               </td>
               </tr>
               </tbody>
               </table>
               </body>
               </html>";
                $mail= new ContactForm();
               $mail->sendEmail($to,$from,$html,$subject);
               Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
         }
         else
         {
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
         }
        }

       return $this->render('forgetpassword',['model' => $model]);
    }
    
      public function actionResetemppassword($ucode)
    {
        $model = new AllUser();
        $chk=$model->find()->where(['VerifyKey'=>$ucode,'UserTypeId'=>2])->one();
        
        if ($model->load(Yii::$app->request->post())) {
            $chk->Password=md5($model->Password);
            $chk->save();
            Yii::$app->session->setFlash('success', 'New password has been saved.');
            return $this->redirect(['login']);
            }
            else
            {
                if($chk)
                {
                    if($chk->ForgotStatus==0)
                    {
                    $chk->ForgotStatus=1;
                    $chk->save();
                    return $this->render('resetemppassword', ['ucode'=>$ucode,'model' => $model,]);
                    }
                    else
                    {
                       Yii::$app->session->setFlash('error', 'Your reset password link expired');  
                    }
                }
                else{
                    Yii::$app->session->setFlash('success', 'Please give your registered EmailId for create a new password.');
                     return $this->redirect(['forgetpassword']); 
                }
            }
    }
    
    public function actionEmployeechangepassword()
    {
        $model = new AllUser();
        
        if ($model->load(Yii::$app->request->post())) {
            $cpass=md5(Yii::$app->request->post('AllUser')['CPassword']);
            $npass=Yii::$app->request->post('AllUser')['NPassword'];
            $UserId=Yii::$app->request->post('AllUser')['UserId'];
            $chk=$model->find()->where(['UserId'=>$UserId])->one();
            if($chk->Password==$cpass){
            $chk->Password=md5($npass);
            $chk->save();
            Yii::$app->session->setFlash('success', 'Password Has been Changed.');
            return $this->redirect(['profilepage']); 
            
            }else{
            Yii::$app->session->setFlash('error', 'Incorrect Current Password.');
            return $this->render('employeechangepassword', ['model'=>$model]); 
            }
            
            }
            else
            {
                return $this->render('employeechangepassword', ['model'=>$model]); 
               
            }
    }
    
    
    
    
    public function actionRegister()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
            
            $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        return $this->render('register');
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionSearchcandidate()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        return $this->render('searchcandidate');
    }
        

    
    public function actionProfilepage()
    {
        if(isset(Yii::$app->session['Employeeid']))
        {
        $alluser=new AllUser();
        $profile=$alluser->find()->where(['UserId'=>Yii::$app->session['Employeeid']])->one();
        
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        $this->layout='layout';
        return $this->render('profilepage',['profile'=>$profile]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionEditprofile()
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        if(isset(Yii::$app->session['Employeeid']))
        {
         $alluser=new AllUser();
        $profile=$alluser->find()->where(['UserId'=>Yii::$app->session['Employeeid']])->one();
        if($profile->PhotoId!=0)
        {
            $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
            $pimage=$url.$profile->photo->Doc;
        }
        else
        {
            $pimage='images/user.png';
        }
        
        $skill=new Skill();
        $position=new Position();
        $course=new Course();
        $docmodel=new Documents();
        
        $allskill=$skill->find()->where("IsDelete=0")->all();
        $allposition=$position->find()->where("IsDelete=0")->all();
        $allcourse=$course->find()->where("IsDelete=0")->all();
        $cvid=$profile->CVId;
        $photoid=$profile->PhotoId;
        
        if ($profile->load(Yii::$app->request->post())) {
            $cv = UploadedFile::getInstance($profile, 'CVId');
            if($cv)
            {
            $cv_id=$docmodel->imageUpload($cv,'CVId');
            }
            else
            {
                $cv_id=$cvid;
            }
            
            $photo = UploadedFile::getInstance($profile, 'PhotoId');
            if($photo)
            {
            $photo_id=$docmodel->imageUpload($photo,'PhotoId');
            }
            else
            {
                $photo_id=$photoid;
            }
            
            if(Yii::$app->request->post()['AllUser']['CompanyName']!='')
            {
            $profile->EntryType='Experience';
            }
            else
            {
            $profile->EntryType='Fresher';    
            }
            $profile->CVId=$cv_id;
            $profile->PhotoId=$photo_id;
            $profile->save();
            
            if($profile->PhotoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$profile->photo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
              Yii::$app->session['EmployeeDP']=$pimage;
            
            $education=Education::find()->where(['UserId'=>$profile->UserId])->one();
            $education->HighestQualification=Yii::$app->request->post()['AllUser']['HighestQualification'];
            $education->CourseId=Yii::$app->request->post()['AllUser']['CourseId'];
            $education->University=Yii::$app->request->post()['AllUser']['University'];
            $education->SkillId=Yii::$app->request->post()['AllUser']['SkillId'];
            $education->save();
            
            if(Yii::$app->request->post()['AllUser']['CompanyName']!='')
            {
            $experience=Experience::find()->where(['UserId'=>$profile->UserId])->one();
            if($experience)
            {
            $experience->CompanyName=Yii::$app->request->post()['AllUser']['CompanyName'];
            $experience->PositionId=Yii::$app->request->post()['AllUser']['PositionId'];
            $experience->Experience=Yii::$app->request->post()['AllUser']['Experience'];
            $experience->save();
            }
            else
            {
            $experience=new Experience();
            $experience->UserId=$profile->UserId;
            $experience->CompanyName=Yii::$app->request->post()['AllUser']['CompanyName'];
            $experience->PositionId=Yii::$app->request->post()['AllUser']['PositionId'];
            $experience->YearFrom=Yii::$app->request->post()['AllUser']['YearFrom'];
            $experience->YearTo=Yii::$app->request->post()['AllUser']['YearTo'];
            $experience->Experience=Yii::$app->request->post()['AllUser']['Experience'];
            $experience->Salary=Yii::$app->request->post()['AllUser']['Salary'];
            $experience->OnDate=date('Y-m-d');
            $experience->save();
            
            }
            }
            
            //return $this->render('editprofile',['profile'=>$profile,'skill'=>$allskill,'position'=>$allposition,'course'=>$allcourse]);
            Yii::$app->session->setFlash('success', "Profile Updated Successfully");
            return $this->redirect(['profilepage']);
            }
             else{
            return $this->render('editprofile',['profile'=>$profile,'skill'=>$allskill,'position'=>$allposition,'course'=>$allcourse]);
        }
        
        }
        else
        {
            return $this->redirect(['index']);
        }
        
    }
    
    public function actionApplyjob($JobId)
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        if(isset(Yii::$app->session['Employeeid']))
        {
            $model = new AppliedJob();
            $alreadyapplied = $model->find()->where(['IsDelete'=>0,'JobId'=>$JobId,'UserId'=>Yii::$app->session['Employeeid']])->one();
            if($alreadyapplied>0){
            if($alreadyapplied->Status=='Bookmark'){
                $alreadyapplied->Status="Applied";
                $alreadyapplied->save();
                Yii::$app->session->setFlash('success', "Applied Job Sucescsfully");
                }else{                
                Yii::$app->session->setFlash('error', "You have already applied for this Job.");
                }
            }else{
            $model->JobId = $JobId;
            $model->UserId = Yii::$app->session['Employeeid'];
            $model->OnDate = date("Y-m-d");
            $model->Status ="Applied";
            $model->save();
            //var_dump($model->getErrors());
            Yii::$app->session->setFlash('success', "Applied Job Sucescsfully");
            }
            return $this->redirect(['index']);
        
        }else{
            return $this->redirect(['login']);
        }
       
    }
    
    public function actionApplidjob()
    {
        
    }
    
}
