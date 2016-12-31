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
use yii\helpers\Url;

use common\models\Notification;
use common\models\EmpNotification;
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
use common\models\FooterAboutus;
use common\models\FooterContactus;
use common\models\FooterCopyright;
use common\models\FooterDevelopedblock;
use common\models\SocialIcon;
use common\models\FooterThirdBlock;
use common\models\Feedback;
use common\models\PeoplesayBlock;
use common\models\EmployeeSkill;

use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
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
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
                 'successUrl' => Url::to(['usersocial']),
              ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function oAuthSuccess($client) {
  // get user data from client
  $userAttributes = $client->getUserAttributes();
if($_GET['authclient']=='facebook')
{
$name=$userAttributes['name'];
$id=$userAttributes['id'];
$email=$userAttributes['email'];
}
else if($_GET['authclient']=='google')
{
$name=$userAttributes['name']['givenName'];
$id=$userAttributes['id'];
$email=$userAttributes['emails'][0]['value'];
}

$client=$_GET['authclient'];
$session = Yii::$app->session;
$session->open();
                
$userlist=new AllUser();
$count=$userlist->find()->where(['Email'=>$email,'IsDelete'=>0,'VerifyStatus'=>1])->count();
if($count>0)
{
    $rest=$userlist->find()->where(['Email'=>$email,'IsDelete'=>0,'VerifyStatus'=>1])->one();
                Yii::$app->session['EmployeeEmail']=$email;
                Yii::$app->session['Employeeid']=$rest->UserId;
                Yii::$app->session['EmployeeName']=$name;
}
else
{
    Yii::$app->session['SocialEmail']=$email;
    Yii::$app->session['SocialName']=$name;
}
  // do some thing with user data. for example with $userAttributes['email']
}


public function actionUsersocial()
{
 echo Yii::$app->session['SocialEmail'];   
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
        if(isset(Yii::$app->request->post()['indexsearch']))
        {
            $keyname=Yii::$app->request->post()['keyname'];
            $indexlocation=Yii::$app->request->post()['indexlocation'];
            $experience=Yii::$app->request->post()['experience'];
            $salary=Yii::$app->request->post()['salary'];
            
            $sklist=array();
            $skilllist=Skill::find()->where(['like','Skill',$keyname])->all();
            foreach($skilllist as $sk=>$sv)
            {
            $sklist[]=$sv->SkillId;
            }
            if($salary!='')
                {
                    $salaryrange=$salary;
                    
                }else{$salaryrange='';}
            
            $alljob=$postjob->find()->where(['PostJob.IsDelete'=>0,'Jobstatus'=>0])->joinWith(['jobRelatedSkills'])
            ->andFilterWhere(['or',
                ['like', 'JobTitle', $keyname],
                ['like', 'CompanyName', $keyname],
                ['JobRelatedSkill.SkillId'=>$sklist]])
            ->andFilterWhere(['Location'=>$indexlocation,'Experience'=>$experience,'Salary'=>$salaryrange])
                ->orderBy(['PostJob.OnDate'=>SORT_DESC]);
        }
        else
        {
            $alljob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC]);
        }
        $pages = new Pagination(['totalCount' => $alljob->count()]);
        if(isset(Yii::$app->request->get()['perpage']))
        {
            $pages->defaultPageSize=Yii::$app->request->get()['perpage'];
        }
        else
        {
            $pages->defaultPageSize=10;
        }
		$alljob = $alljob->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        
        //Top Job
        $topjob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(5)->all();
        
        //hot categories
        $hotcategory=$postjob->find()->select(['count(*) as cnt','JobCategory.CategoryName as CategoryName','JobCategory.JobCategoryId as JobCategoryId'])->joinWith(['jobCategory'])->where(['PostJob.IsDelete'=>0,'Jobstatus'=>0])->groupBy(['PostJob.JobCategoryId'])->all();
        
        //top job
        $topjobopening=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0,'TopJob'=>1])->all();
        
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        //companies who posted job
        $companylogo=$postjob->find()->select(['CompanyName','LogoId','Website'])->groupBy(['CompanyName'])->all();
        
        $peoplesayblock=new PeoplesayBlock();
        $pb=$peoplesayblock->find()->one();
        
        //all feedback
        $fdbk=new Feedback();
        $allfeedback=$fdbk->find()->where(['IsApprove'=>1])->orderBy(['OnDate'=>'SORT_DESC'])->all();
        
        //notification for employee
//        $allnotification=array();
//		if(isset(Yii::$app->session['Employeeid']))
//		{
//        $notification=new Notification();
//        $allnotification=$notification->find()->where(['UserId'=>Yii::$app->session['Employeeid'],'IsView'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
//        }
//        Yii::$app->view->params['employeenotification']=$allnotification;
        
        //notification for employer
        //$allntemp=array();
        //if(isset(Yii::$app->session['Employerid']))
        //{
        //    $empnot=new EmpNotification();
        //    $allntemp=$empnot->find()->where(['EmpId'=>Yii::$app->session['Employerid'],'IsView'=>0])->orderBy(['OnDate'=>SORT_DESC])->all();
        //}
        //Yii::$app->view->params['employernotification']=$allntemp;
        
        $this->layout='main';
        
        return $this->render('index',['alljob'=>$alljob,'pages' => $pages,'topjob'=>$topjob,'hotcategory'=>$hotcategory,'allcompany'=>$companylogo,'peoplesayblock'=>$pb,'allfeedback'=>$allfeedback,'topjobopening'=>$topjobopening]);
    }
    
    public function actionJobdetail()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $JobId=Yii::$app->request->get()['JobId'];
        $postjob=new PostJob();
        $postdetail=$postjob->find()->where(['JobId'=>$JobId,'JobStatus'=>0])->one();
        
        if(isset(Yii::$app->request->get()['Nid']))
        {
            $nid=Yii::$app->request->get()['Nid'];
            $notification=Notification::find()->where(['NotificationId'=>$nid])->one();
            $notification->IsView=1;
            $notification->save();
        }
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
        
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
            if(isset(Yii::$app->session['Employerid']))
               {
                return $this->redirect(['companyprofile']);
               }
               else
               {
                return $this->redirect(['index']);
               }
            
        }
    }
    
    public function actionEmployersregister()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
        
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
       
        $model=new AllUser();
        $allindustry= ArrayHelper::map(Industry::find()->where(['IsDelete'=>0])->orderBy(['IndustryName'=>'SORT_ASC'])->all(),'IndustryId','IndustryName');
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
                $model->VerifyStatus=1;
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
                $subject="Registration Success";
                
               $html= "<html>
               <head>
               <title>Registration Success</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
               //Yii::$app->session->setFlash('success', 'Check your email for EmailId Verification.');
               
               $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['Employerid']=$model->UserId;
                Yii::$app->session['EmployerName']=$model->Name;
                Yii::$app->session['EmployerEmail']=$model->Email;
                if($model->LogoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$model->logo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
                Yii::$app->session['EmployerDP']=$pimage;
                
               return $this->redirect(['thankyou']);
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
       //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
            //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $model=new AllUser();
        $employerid= Yii::$app->session['Employerid'];
        $employerone=$model->find()->where(['UserId'=>$employerid])->one();
        return $this->render('companyprofile', ['employer'=>$employerone]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    public function actionCompanyprofileeditpage()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
           //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
            //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        
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
            if($postajob->save())
            {
                $val=1;
                Yii::$app->session->setFlash('success', 'Job Post Successfully');
            }
            else
            {
                $val=0;
                Yii::$app->session->setFlash('error', 'There is some error ,Please try again');
            }
            
            $jobskill=array();
            //new skill
            $rawskill=explode(",",Yii::$app->request->post()['PostJob']['RawSkill']);
            foreach($rawskill as $rk=>$rval)
            {
                if($rval!='')
                {
                $indskill=trim($rval);
                $nskill=new Skill();
                $cskill=$nskill->find()->where(['Skill'=>$indskill,'IsDelete'=>0])->one();
                if(!$cskill)
                {
                    $nskill->Skill=$indskill;
                    $nskill->OnDate=date('Y-m-d');
                    $nskill->save();
                    $skid=$nskill->SkillId;
                }
                else
                {
                    $skid=$cskill->SkillId;
                }
                $jobskill[]=$skid;
                    $jobrelatedskill=new JobRelatedSkill();
                    $jobrelatedskill->JobId=$postajob->JobId;
                    $jobrelatedskill->SkillId=$skid;
                    $jobrelatedskill->OnDate=date('Y-m-d');
                    $jobrelatedskill->save();
                }
            }
            
            $userlist=AllUser::find()->where(['AllUser.IsDelete'=>0,'VerifyStatus'=>1,'EmployeeSkill.SkillId'=>$jobskill])->joinWith(['skilldetail'])->all();
            if($userlist)
            {
            foreach($userlist as $uk=>$uval)
            {
                $nt=new Notification();
                $nt->JobId=$postajob->JobId;
                $nt->UserId=$uval->UserId;
                $nt->IsView=0;
                $nt->save();
            }
            }
            
            
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $postjob=new PostJob();
        
        //All Job
        if(isset(Yii::$app->request->get()['JobCategoryId']))
        {
            $jobcategoryid=Yii::$app->request->get()['JobCategoryId'];
        }
        else
        {
            $jobcategoryid='';
        }
        $latest='';$role='';$state='';$jobtype=array();
        if(isset(Yii::$app->request->get()['latest']))
        {
            $latest=Yii::$app->request->get()['latest'];
        }
        if(isset(Yii::$app->request->get()['role']))
        {
            $role=Yii::$app->request->get()['role'];
        }
        if(isset(Yii::$app->request->get()['state']))
        {
            $state=Yii::$app->request->get()['state'];
        }
        if(isset(Yii::$app->request->get()['salaryrange']) && Yii::$app->request->get()['salaryrange']!='')
        {
            $salary=explode(",",Yii::$app->request->get()['salaryrange']);
        }else{$salary='';}
        if(isset(Yii::$app->request->get()['jobtype']) && Yii::$app->request->get()['jobtype']!='')
        {
            $jobtype=explode(",",Yii::$app->request->get()['jobtype']);
        }
            
        $alljob=$postjob->find()->where(['IsDelete'=>0,'Jobstatus'=>0])->
        andFilterWhere([
                        'JobCategoryId'=>$jobcategoryid,
                        'PositionId'=>$role,
                        'State'=>$state,
                        'JobType'=>$jobtype,
                        'Salary'=>$salary,
            ])
            ->andFilterWhere(['>', 'DATE( `OnDate` )', "(DATE(NOW( ) - INTERVAL $latest DAY))"])->orderBy(['OnDate'=>SORT_DESC]);
        
        $pages = new Pagination(['totalCount' => $alljob->count()]);
        if(isset(Yii::$app->request->get()['perpage']))
        {
            $pages->defaultPageSize=Yii::$app->request->get()['perpage'];
        }
        else
        {
            $pages->defaultPageSize=10;
        }
	$alljob = $alljob->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        
        
        //position
        $position=new Position();
        $allposition=$position->find()->where(['IsDelete'=>0])->all();
        
        //
        //hot categories
        $hotcategory=$postjob->find()->select(['count(*) as cnt','JobCategory.CategoryName as CategoryName','JobCategory.JobCategoryId'])->joinWith(['jobCategory'])->where(['PostJob.IsDelete'=>0,'Jobstatus'=>0])->groupBy(['PostJob.JobCategoryId'])->all();
        return $this->render('jobsearch',['alljob'=>$alljob,'pages'=>$pages,'hotcategory'=>$hotcategory,'role'=>$allposition]);
    }
    
    public function actionHirecandidate()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $state='';
        if(isset(Yii::$app->request->get()['state']))
        {
            $state=Yii::$app->request->get()['state'];
        }
        if(isset(Yii::$app->request->get()['salaryrange']) && Yii::$app->request->get()['salaryrange']!='')
        {
            $salary=explode(",",Yii::$app->request->get()['salaryrange']);
        }else{$salary='';}
        if(isset(Yii::$app->request->get()['jobtype']) && Yii::$app->request->get()['jobtype']!='')
        {
            $jobtype=explode(",",Yii::$app->request->get()['jobtype']);
        }
            
            
        $alluser=new AllUser();
        if(isset(Yii::$app->request->post()['candidatesearch']))
        {
            $keyname=Yii::$app->request->post()['keysearch'];
            $indexlocation=Yii::$app->request->post()['location'];
            $experience=Yii::$app->request->post()['experience'];
            $category=Yii::$app->request->post()['category'];
            
            $allcandidate=$alluser->find()->where(['AllUser.IsDelete'=>0,'VerifyStatus'=>1])->joinWith(['experiences','industry','educations'])
            ->andFilterWhere(['or',
                ['like', 'Industry.IndustryName', $keyname],
                ['like', 'Education.HighestQualification', $keyname],])
            ->andFilterWhere(['State'=>$indexlocation,'Experience.Experience'=>$experience,'Experience.PositionId'=>$category])
                ->orderBy(['AllUser.OnDate'=>SORT_DESC]);
        }
        else
        {
        $allcandidate=$alluser->find()->where(['AllUser.IsDelete'=>0,'VerifyStatus'=>1])->joinWith(['experiences'])->
        andFilterWhere([
                        'State'=>$state,
                        'Experience.Salary'=>$salary,
            ])
        ->orderBy(['AllUser.OnDate'=>SORT_DESC]);
        }
        
        $pages = new Pagination(['totalCount' => $allcandidate->count()]);
        if(isset(Yii::$app->request->get()['perpage']))
        {
            $pages->defaultPageSize=Yii::$app->request->get()['perpage'];
        }
        else
        {
            $pages->defaultPageSize=10;
        }
	$allcandidate = $allcandidate->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        
        $allposition=Position::find()->select(['Position','PositionId'])->where(['IsDelete'=>0])->orderBy(['Position'=>SORT_ASC])->all();
        return $this->render('hirecandidate',['candidate'=>$allcandidate,'pages'=>$pages,'allcategory'=>$allposition]);
    }
    
    public function actionJobseekersregister()
    {
        if(!isset(Yii::$app->session['Employerid']) && !isset(Yii::$app->session['Employeeid'])){
        
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $skill=new Skill();
        $position=new Position();
        $course=new Course();
        $alluser=new AllUser();
        $docmodel=new Documents();
        
        $allskill=$skill->find()->where("IsDelete=0")->all();
        $allposition=$position->find()->where("IsDelete=0")->orderBy(['Position'=>'SORT_ASC'])->all();
        $allcourse=$course->find()->where("IsDelete=0")->orderBy(['CourseName'=>'SORT_ASC'])->all();
        
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
            
            //other course
            if(isset(Yii::$app->request->post()['AllUser']['OtherCourse']) && Yii::$app->request->post()['AllUser']['OtherCourse']!='')
            {
                $ncourse=new Course();
                $ncourse->CourseName=Yii::$app->request->post()['AllUser']['OtherCourse'];
                $ncourse->OnDate=date('Y-m-d');
                $ncourse->save();
                $courseId=$ncourse->CourseId;
            }
            else
            {
                $courseId=Yii::$app->request->post()['AllUser']['CourseId'];
            }
            
            //other position
            if(isset(Yii::$app->request->post()['AllUser']['OtherPosition']) && Yii::$app->request->post()['AllUser']['OtherPosition']!='')
            {
                $nposition=new Position();
                $nposition->Position=Yii::$app->request->post()['AllUser']['OtherPosition'];
                $nposition->OnDate=date('Y-m-d');
                $nposition->save();
                $positionId=$nposition->PositionId;
            }
            else
            {
                $positionId=Yii::$app->request->post()['AllUser']['PositionId'];
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
            $alluser->VerifyStatus=1;
            $alluser->save();
            
             //new skill
            $rawskill=explode(",",Yii::$app->request->post()['AllUser']['RawSkill']);
            foreach($rawskill as $rk=>$rval)
            {
                $indskill=trim($rval);
                $nskill=new Skill();
                $cskill=$nskill->find()->where(['Skill'=>$indskill,'IsDelete'=>0])->one();
                if(!$cskill)
                {
                    $nskill->Skill=$indskill;
                    $nskill->OnDate=date('Y-m-d');
                    $nskill->save();
                    $skid=$nskill->SkillId;
                }
                else
                {
                    $skid=$cskill->SkillId;
                }
                    $empskill=new EmployeeSkill();
                    $empskill->SkillId=$skid;
                    $empskill->UserId=$alluser->UserId;
                    $empskill->OnDate=date('Y-m-d');
                    $empskill->save();
                
            }
            
            $education=new Education;
            $education->UserId=$alluser->UserId;
            $education->HighestQualification=Yii::$app->request->post()['AllUser']['HighestQualification'];
            $education->CourseId=$courseId;
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
            $experience->PositionId=$positionId;
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
                $subject="Registration Success";
                
               $html= "<html>
               <head>
               <title>Registration Success</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
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
                
                $session = Yii::$app->session;
                $session->open();
                Yii::$app->session['Employeeid']=$alluser->UserId;
                Yii::$app->session['EmployeeName']=$alluser->Name;
                Yii::$app->session['EmployeeEmail']=$alluser->Email;
                if($alluser->PhotoId!=0)
                {
                    $url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
                    $pimage=$url.$alluser->photo->Doc;
                }
                else
                {
                    $pimage='images/user.png';
                }
                Yii::$app->session['EmployeeDP']=$pimage;
                
                //Yii::$app->session->setFlash('success', "Account Created Successfully");
                return $this->redirect(['thankyou']);
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
            
            //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
                $appliedjob=new AppliedJob();
                $noofjobapplied=$appliedjob->find()->where(['Status'=>'Applied','UserId'=> Yii::$app->session['Employeeid']])->count();
                Yii::$app->session['NoofjobApplied']=$noofjobapplied;
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
            if(isset(Yii::$app->session['Employeeid']))
               {
                return $this->redirect(['profilepage']);
               }
               else
               {
                return $this->redirect(['index']);
               }
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:150px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
               Please click in the link to create your new password
               <br/>
               <a href='http://45.58.34.139/careerbug/frontend/web/index.php?r=site%2Fresetpassword&ucode=$ucode'>
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:150px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
               Please click in the link to create your new password
               <br/>
               <a href='http://45.58.34.139/careerbug/frontend/web/index.php?r=site%2Fresetemppassword&ucode=$ucode'>
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
            
           //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        return $this->render('searchcandidate');
    }
        

    
    public function actionProfilepage()
    {
        if(isset(Yii::$app->session['Employeeid']))
        {
        $alluser=new AllUser();
        $profile=$alluser->find()->where(['UserId'=>Yii::$app->session['Employeeid']])->one();
        
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
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
            
            EmployeeSkill::deleteAll(['UserId' => $profile->UserId]);
            
            //new skill
            $rawskill=explode(",",Yii::$app->request->post()['AllUser']['RawSkill']);
            foreach($rawskill as $rk=>$rval)
            {
                $indskill=trim($rval);
                $nskill=new Skill();
                $cskill=$nskill->find()->where(['Skill'=>$indskill,'IsDelete'=>0])->one();
                if(!$cskill)
                {
                    $nskill->Skill=$indskill;
                    $nskill->OnDate=date('Y-m-d');
                    $nskill->save();
                    $skid=$nskill->SkillId;
                }
                else
                {
                    $skid=$cskill->SkillId;
                }
                    $empskill=new EmployeeSkill();
                    $empskill->SkillId=$skid;
                    $empskill->UserId=$profile->UserId;
                    $empskill->OnDate=date('Y-m-d');
                    $empskill->save();
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
            if($alreadyapplied){
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
            
           
            Yii::$app->session->setFlash('success', "Applied Job Sucescsfully");
            }
            
            $jobdet=PostJob::find()->where(['JobId'=>$JobId])->one();
            $empnt=new EmpNotification();
            $empnt->EmpId=$jobdet->EmployerId;
            $empnt->UserId=Yii::$app->session['Employeeid'];
            $empnt->JobId=$JobId;
            $empnt->Type='Applied';
            $empnt->IsView=0;
            $empnt->save();
              
           $noofjobapplied=$model->find()->where(['Status'=>'Applied','UserId'=> Yii::$app->session['Employeeid']])->count();
           Yii::$app->session['NoofjobApplied']=$noofjobapplied;
            
            return $this->redirect(['index']);
        
        }else{
            return $this->redirect(['login']);
        }
       
    }
    
    public function actionAppliedjob()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $model=new AppliedJob();
        $appliedjobs = $model->find()->where(['IsDelete'=>0,'Status'=>'Applied','UserId'=>Yii::$app->session['Employeeid']])->all();
        
        return $this->render('appliedjob',['model'=>$appliedjobs,]);
        
    }
    
    
    
    
    public function actionBookmark($JobId)
    {
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        if(isset(Yii::$app->session['Employeeid']))
        {
            $model = new AppliedJob();
            $alreadyapplied = $model->find()->where(['IsDelete'=>0,'JobId'=>$JobId,'UserId'=>Yii::$app->session['Employeeid']])->one();
            if($alreadyapplied){
            if($alreadyapplied->Status=='Bookmark'){               
                Yii::$app->session->setFlash('error', "You have already bookmarked for this Job.");
                }else{                
                Yii::$app->session->setFlash('error', "You have already Applied for this Job.");                
                }
            }else{
            $model->JobId = $JobId;
            $model->UserId = Yii::$app->session['Employeeid'];
            $model->OnDate = date("Y-m-d");
            $model->Status ="Bookmark";
            $model->save();
            
            $noofjobapplied=$model->find()->where(['Status'=>'Applied','UserId'=> Yii::$app->session['Employeeid']])->count();
            Yii::$app->session['NoofjobApplied']=$noofjobapplied;
            
            $jobdet=PostJob::find()->where(['JobId'=>$JobId])->one();
            $empnt=new EmpNotification();
            $empnt->EmpId=$jobdet->EmployerId;
            $empnt->UserId=Yii::$app->session['Employeeid'];
            $empnt->JobId=$JobId;
            $empnt->Type='Bookmarked';
            $empnt->IsView=0;
            $empnt->save();
            
            //var_dump($model->getErrors());
            Yii::$app->session->setFlash('success', "You have Bookmarked a job.");
            }
            return $this->redirect(['index']);
        
        }else{
            return $this->redirect(['login']);
        }
       
    }
    
    public function actionBookmarkjob()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $model=new AppliedJob();
        $appliedjobs = $model->find()->where(['IsDelete'=>0,'Status'=>'Bookmark','UserId'=>Yii::$app->session['Employeeid']])->all();
        
        return $this->render('bookmarkedjob',['model'=>$appliedjobs,]);
        
    }
    
    
    public function actionJobedit()
    {
        if(isset(Yii::$app->session['Employerid'])){
          
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $this->layout='layout';
        $JobId=Yii::$app->request->get()['JobId'];
        $postjob=new PostJob();
        $postdetail=$postjob->find()->where(['JobId'=>$JobId])->one();
        
        $position=new Position();
        $jobcategory=new JobCategory();
        $allposition=$position->find()->where("IsDelete=0")->all();
        $allcategory=$jobcategory->find()->where("IsDelete=0")->all();
        
        $logoold=$postdetail->LogoId;
         $docmodel=new Documents();
        if ($postdetail->load(Yii::$app->request->post())) {
            $logo = UploadedFile::getInstance($postdetail, 'LogoId');
            if($logo)
            {
            $logo_id=$docmodel->imageUpload($logo,'CompanyLogo');
            }
            else
            {
                $logo_id=$logoold;
            }
            $postdetail->LogoId=$logo_id;
            $postdetail->save();
            
            $jobrelatedskill=new JobRelatedSkill();
            JobRelatedSkill::deleteAll(['JobId' => $JobId]);
             //new skill
            $rawskill=explode(",",Yii::$app->request->post()['PostJob']['RawSkill']);
            foreach($rawskill as $rk=>$rval)
            {
                if($rval!='')
                {
                $indskill=trim($rval);
                $nskill=new Skill();
                $cskill=$nskill->find()->where(['Skill'=>$indskill,'IsDelete'=>0])->one();
                if(!$cskill)
                {
                    $nskill->Skill=$indskill;
                    $nskill->OnDate=date('Y-m-d');
                    $nskill->save();
                    $skid=$nskill->SkillId;
                }
                else
                {
                    $skid=$cskill->SkillId;
                }
                    $jobrelatedskill=new JobRelatedSkill();
                    $jobrelatedskill->JobId=$JobId;
                    $jobrelatedskill->SkillId=$skid;
                    $jobrelatedskill->OnDate=date('Y-m-d');
                    $jobrelatedskill->save();
                }
            }
            Yii::$app->session->setFlash('success', 'Job Post Edited Successfully');
            return $this->redirect(['yourpost']);
        }
        else
        {
        return $this->render('jobedit',['allpost'=>$postdetail,'position'=>$allposition,'jobcategory'=>$allcategory]);
        }
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionFeedback()
    {
        //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        $docmodel=new Documents();
        
        $this->layout='layout';
        $feedback=new Feedback();
        if ($feedback->load(Yii::$app->request->post())) {
            $logo = UploadedFile::getInstance($feedback, 'Logo');
                if($logo)
                {
                $logo_id=$docmodel->imageUpload($logo,'Feedbackphoto');
                }
                else
                {
                    $logo_id=0;
                }
                $feedback->Logo=$logo_id;
                $feedback->IsDelete=0;
                $feedback->OnDate=date('Y-m-d');
            if($feedback->save())
            {
                $to=$feedback->Email;
                $from=Yii::$app->params['adminEmail'];
                $subject="Thank you for your feedback";
                
               $html= "<html>
               <head>
               <title>Feedback</title>
               </head>
               <body>
               <table style='width:500px;height:auto;margin:auto;font-family:arial;color:#4d4c4c;background:#efefef;text-align:center'>
                <tbody><tr>
                                       <td><img src='http://45.58.34.139/careerbug/frontend/web/images/logo.png' title='Career Bugs' alt='Career Bugs' style='margin-top:10px;width:200px;'></td>
                                   </tr>
                                   <tr>
                                       <td style='height:30px'></td>
                                   </tr>
                           <tr>
                                       <td style='font-size:18px'><h2 style='width:85%;font-weight:normal;background:#ffffff;padding:5%;margin:auto'>Welcome to <a href='http://45.58.34.139/careerbug/frontend/web' target='_blank'> Career Bugs </a>
               <br><br>
               <span style='font-size:16px;line-height:1.5'>
                 <h3> Dear , $to</h3>
Thank you for your feedback
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
               
                Yii::$app->session->setFlash('success', "Thank you for your feedback");
            }
            else
            {
                Yii::$app->session->setFlash('error', "There is some error please try again");
            }
            
            return $this->render('feedback',['feedback'=>$feedback]);
        }
        else
        {
            return $this->render('feedback',['feedback'=>$feedback]);
        }
    }
    
    public function actionThankyou()
    {
       //footer section
        
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
        
        return $this->render('thankyou');
    }
    
    
    public function actionEmpdashboard()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
           //footer section
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
            $this->layout='layout';
            $postjob=new PostJob();
            $totaljob=$postjob->find()->where(['EmployerId'=>Yii::$app->session['Employerid']])->count();
            $totalactive=$postjob->find()->where(['EmployerId'=>Yii::$app->session['Employerid'],'JobStatus'=>0])->count();
            
            $candidateapplied=AppliedJob::find()->where(['PostJob.EmployerId'=>Yii::$app->session['Employerid'],'Status'=>'Applied'])->joinWith(['job'])->count();
            
            $candidatebookmarked=AppliedJob::find()->where(['PostJob.EmployerId'=>Yii::$app->session['Employerid'],'Status'=>'Bookmark'])->joinWith(['job'])->count();
            return $this->render('employerdashboard',['totaljob'=>$totaljob,'totalactivejob'=>$totalactive,'appliedjob'=>$candidateapplied,'bookmarked'=>$candidatebookmarked]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    
    
    public function actionUserdashboard()
    {
        if(isset(Yii::$app->session['Employeeid']))
        {
           //footer section
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
            $this->layout='layout';
            
            $candidateapplied=AppliedJob::find()->where(['UserId'=>Yii::$app->session['Employeeid'],'Status'=>'Applied'])->count();
            
            $candidatebookmarked=AppliedJob::find()->where(['UserId'=>Yii::$app->session['Employerid'],'Status'=>'Bookmark'])->count();
            return $this->render('userdashboard',['appliedjob'=>$candidateapplied,'bookmarked'=>$candidatebookmarked]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionCandidateapplied()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
           //footer section
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
            $this->layout='layout';
            $postjob=new PostJob();
            
            $candidateapplied=AppliedJob::find()->where(['PostJob.EmployerId'=>Yii::$app->session['Employerid'],'Status'=>'Applied'])->joinWith(['job','user']);
            $pages = new Pagination(['totalCount' => $candidateapplied->count()]);
        if(isset(Yii::$app->request->get()['perpage']))
        {
            $pages->defaultPageSize=Yii::$app->request->get()['perpage'];
        }
        else
        {
            $pages->defaultPageSize=10;
        }
	$candidateapplied = $candidateapplied->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
            return $this->render('candidateapplied',['appliedjob'=>$candidateapplied,'pages'=>$pages]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionCandidatebookmarked()
    {
        if(isset(Yii::$app->session['Employerid']))
        {
           //footer section
        //first block
        $about=new FooterAboutus();
        $footerabout=$about->find()->one();
        Yii::$app->view->params['footerabout']=$footerabout;
        
        //contactus block
        $cn=new FooterContactus();
        $footercontact=$cn->find()->one();
        Yii::$app->view->params['footercontact']=$footercontact;
        
        //second block
        $jobcategory=new JobCategory();
        $allhotcategory=$jobcategory->find()->select(['CategoryName','JobCategoryId'])->where(['IsDelete'=>0])->orderBy(['OnDate'=>SORT_DESC])->limit(7)->all();
        Yii::$app->view->params['hotcategory']=$allhotcategory;
        
        //copyright block
        $cp=new FooterCopyright();
        $allcp=$cp->find()->one();
        Yii::$app->view->params['footercopyright']=$allcp;
        
        //developer block
        $dblock=new FooterDevelopedblock();
        $developerblock=$dblock->find()->one();
        Yii::$app->view->params['footerdeveloperblock']=$developerblock;
        
        //socialicon block
        $socialicon=new SocialIcon();
        $sicon=$socialicon->find()->one();
        Yii::$app->view->params['footersocialicon']=$sicon;
        
        //third block
        $th=new FooterThirdBlock();
        $thirdblock=$th->find()->one();
        Yii::$app->view->params['footerthirdblock']=$thirdblock;
        
            $this->layout='layout';
            $postjob=new PostJob();
            
            $candidateapplied=AppliedJob::find()->where(['PostJob.EmployerId'=>Yii::$app->session['Employerid'],'Status'=>'Bookmark'])->joinWith(['job','user']);
            $pages = new Pagination(['totalCount' => $candidateapplied->count()]);
        if(isset(Yii::$app->request->get()['perpage']))
        {
            $pages->defaultPageSize=Yii::$app->request->get()['perpage'];
        }
        else
        {
            $pages->defaultPageSize=10;
        }
	$candidateapplied = $candidateapplied->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
            return $this->render('candidateapplied',['appliedjob'=>$candidateapplied,'pages'=>$pages]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
    
    
}
