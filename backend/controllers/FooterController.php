<?php

namespace backend\controllers;

use Yii;
use common\models\FooterAboutus;
use common\models\FooterContactus;
use common\models\FooterCopyright;
use common\models\FooterDevelopedblock;
use common\models\SocialIcon;
use common\models\FooterThirdBlock;
use common\models\PeoplesayBlock;
use common\models\Feedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AboutController implements the CRUD actions for About model.
 */
class FooterController extends Controller
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
     * Lists all About models.
     * @return mixed
     */
    public function actionAboutindex()
    {
        $footeraboutus=new FooterAboutus();
        $model=$footeraboutus->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->IsDelete=0;
                $model->OnDate=date('Y-m-d');
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "First Block Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('footeraboutus',['model'=>$model]);
            } else {
                return $this->render('footeraboutus',['model'=>$model]);
            }
        }
        else
        {
            if ($footeraboutus->load(Yii::$app->request->post())) {
                $footeraboutus->IsDelete=0;
                $footeraboutus->OnDate=date('Y-m-d');
                if($footeraboutus->save())
                {
                    Yii::$app->session->setFlash('success', "First Block added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('footeraboutus',['model'=>$footeraboutus]);
            } else {
                return $this->render('footeraboutus',['model'=>$footeraboutus]);
            }
        }
    }

    /**
     * Creates a new About model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionContactindex()
    {
        $footercontactus=new FooterContactus();
        $model=$footercontactus->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->IsDelete=0;
                $model->OnDate=date('Y-m-d');
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "ContactUs Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('footercontactus',['model'=>$model]);
            } else {
                return $this->render('footercontactus',['model'=>$model]);
            }
        }
        else
        {
            if ($footercontactus->load(Yii::$app->request->post())) {
                $footercontactus->IsDelete=0;
                $footercontactus->OnDate=date('Y-m-d');
                if($footercontactus->save())
                {
                    Yii::$app->session->setFlash('success', "ContactUs added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('footercontactus',['model'=>$footercontactus]);
            } else {
                return $this->render('footercontactus',['model'=>$footercontactus]);
            }
        }
    }

    /**
     * Updates an existing About model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCopyrightindex()
    {
        $footercopyrights=new FooterCopyright();
        $model=$footercopyrights->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->IsDelete=0;
                $model->OnDate=date('Y-m-d');
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "Copyright Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('footercopyrights',['model'=>$model]);
            } else {
                return $this->render('footercopyrights',['model'=>$model]);
            }
        }
        else
        {
            if ($footercopyrights->load(Yii::$app->request->post())) {
                $footercopyrights->IsDelete=0;
                $footercopyrights->OnDate=date('Y-m-d');
                if($footercopyrights->save())
                {
                    Yii::$app->session->setFlash('success', "Copyright Added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('footercopyrights',['model'=>$footercopyrights]);
            } else {
                return $this->render('footercopyrights',['model'=>$footercopyrights]);
            }
        }
    }

    /**
     * Deletes an existing About model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDevelopedblock()
    {
        $footerdblock=new FooterDevelopedblock();
        $model=$footerdblock->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->IsDelete=0;
                $model->OnDate=date('Y-m-d');
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "Developer Block Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('footerdblock',['model'=>$model]);
            } else {
                return $this->render('footerdblock',['model'=>$model]);
            }
        }
        else
        {
            if ($footerdblock->load(Yii::$app->request->post())) {
                $footerdblock->IsDelete=0;
                $footerdblock->OnDate=date('Y-m-d');
                if($footerdblock->save())
                {
                    Yii::$app->session->setFlash('success', "Developer Block added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('footerdblock',['model'=>$footerdblock]);
            } else {
                return $this->render('footerdblock',['model'=>$footerdblock]);
            }
        }
    }
    
    public function actionSocialiconindex()
    {
        $socialicon=new SocialIcon();
        $model=$socialicon->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "Social Icon Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('socialicon',['model'=>$model]);
            } else {
                return $this->render('socialicon',['model'=>$model]);
            }
        }
        else
        {
            if ($socialicon->load(Yii::$app->request->post())) {
                if($socialicon->save())
                {
                    Yii::$app->session->setFlash('success', "Social Icon Added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('socialicon',['model'=>$socialicon]);
            } else {
                return $this->render('socialicon',['model'=>$socialicon]);
            }
        }
    }
    
    public function actionThirdindex()
    {
        $tb=new FooterThirdBlock();
        $model=$tb->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "Third Block Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('thirdblock',['model'=>$model]);
            } else {
                return $this->render('thirdblock',['model'=>$model]);
            }
        }
        else
        {
            if ($tb->load(Yii::$app->request->post())) {
                if($tb->save())
                {
                    Yii::$app->session->setFlash('success', "Third Block Added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('thirdblock',['model'=>$tb]);
            } else {
                return $this->render('thirdblock',['model'=>$tb]);
            }
        }
    }
    
    public function actionPeoplesayblock()
    {
        $pb=new PeoplesayBlock();
        $model=$pb->find()->one();
        if($model)
        {
            if ($model->load(Yii::$app->request->post())) {
                if($model->save())
                {
                    Yii::$app->session->setFlash('success', "People Say Block Updated Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
               return $this->render('peopleblock',['model'=>$model]);
            } else {
                return $this->render('peopleblock',['model'=>$model]);
            }
        }
        else
        {
            if ($pb->load(Yii::$app->request->post())) {
                if($pb->save())
                {
                    Yii::$app->session->setFlash('success', "People Say Block Added Successfully");
                }
                else
                {
                    Yii::$app->session->setFlash('error', "There is some error , Please try again");
                }
                return $this->render('peopleblock',['model'=>$pb]);
            } else {
                return $this->render('peopleblock',['model'=>$pb]);
            }
        }
    }
    
    public function actionAllfeedback()
    {
        $feedback=new FeedBack();
        $allfeedback=$feedback->find()->orderBy(['OnDate'=>SORT_DESC])->all();
        
        return $this->render('allfeedback',['allfeedback'=>$allfeedback]);
    }
    
    public function actionApprovefeedback($id)
    {
         $feedback=new FeedBack();
         $feedbackone=$feedback->find()->where(['FeedbackId'=>$id])->one();
         $feedbackone->IsApprove=1;
         $feedbackone->save();
         
         return $this->redirect(['allfeedback']);
    }
    
    public function actionDisapprovefeedback($id)
    {
         $feedback=new FeedBack();
         $feedbackone=$feedback->find()->where(['FeedbackId'=>$id])->one();
         $feedbackone->IsApprove=0;
         $feedbackone->save();
         
         return $this->redirect(['allfeedback']);
    }
}
