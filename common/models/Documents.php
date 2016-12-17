<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/imageupload/';
/**
 * This is the model class for table "Documents".
 *
 * @property integer $DocId
 * @property string $Doc
 * @property integer $IsDelete
 * @property string $OnDate
 *
 * @property AllUser[] $allUsers
 * @property AllUser[] $allUsers0
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Doc', 'OnDate','From'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate'], 'safe'],
            [['Doc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DocId' => 'Doc ID',
            'Doc' => 'Doc',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
        ];
    }

     public function imageUpload($image,$type)
    {
        $ext = end((explode(".", $image->name)));
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $basepath=str_replace('frontend','backend',Yii::$app->basePath);
            Yii::$app->params['uploadPath'] = $basepath . '/imageupload/';
            $ppp=Yii::$app->security->generateRandomString();
            $path = Yii::$app->params['uploadPath'] . $ppp.".{$ext}";
            $this->Doc = 'imageupload/'. $ppp.".{$ext}";
            $this->From=$type;
            $this->OnDate=date('Y-m-d');
            $image->saveAs($path);
            $x=$this->save();
            return $this->DocId;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllUsers()
    {
        return $this->hasMany(AllUser::className(), ['CVId' => 'DocId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllUsers0()
    {
        return $this->hasMany(AllUser::className(), ['PhotoId' => 'DocId']);
    }
}
