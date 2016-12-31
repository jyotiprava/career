<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use yii\data\ActiveDataProvider;

use common\models\AllUser;
use common\models\Education;
use common\models\Experience;
use common\models\ContactUs;

use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * AboutController implements the CRUD actions for About model.
 */
class ReportController extends Controller
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

                        'actions' => ['candidatelist','companylist','candidatedetailview','contactuslist'],
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
     * Lists all About models.
     * @return mixed
     */
    public function actionCandidatelist()
    {
        $dataProvider = AllUser::find()->where(['UserTypeId'=>2])->orderBy(['UpdatedDate'=>SORT_DESC])->all();

        return $this->render('candidatelist', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCompanylist()
    {
        $dataProvider = AllUser::find()->where(['UserTypeId'=>3])->orderBy(['UpdatedDate'=>SORT_DESC])->all();

        return $this->render('companylist', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCandidatedetailview($userid)
    {
        $userdetail=AllUser::find()->where(['UserId'=>$userid])->one();
        return $this->render('candidatedetailview',['profile'=>$userdetail]);
    }
    
     public function actionContactuslist()
    {
        $contactdetail=ContactUs::find()->orderBy(['UpdatedDate'=>SORT_DESC])->all();
        return $this->render('contactuslist',['contactdetail'=>$contactdetail]);
    }
}
