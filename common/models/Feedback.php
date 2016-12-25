<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Feedback".
 *
 * @property integer $FeedbackId
 * @property string $Name
 * @property string $Email
 * @property string $Designation
 * @property string $Companyname
 * @property string $Facebooklink
 * @property string $Twitterlink
 * @property string $LinkedinLink
 * @property string $Message
 * @property integer $Logo
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'Email', 'Designation', 'Companyname','Message', 'Logo', 'IsDelete', 'OnDate'], 'required'],
            [['Message'], 'string'],
            [['Logo', 'IsDelete','IsApprove'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Name', 'Designation', 'Companyname'], 'string', 'max' => 300],
            [['Email'], 'string', 'max' => 200],
            [['Facebooklink', 'Twitterlink', 'LinkedinLink'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FeedbackId' => 'Feedback ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'Designation' => 'Designation',
            'Companyname' => 'Companyname',
            'Facebooklink' => 'Facebooklink',
            'Twitterlink' => 'Twitterlink',
            'LinkedinLink' => 'Linkedin Link',
            'Message' => 'Message',
            'Logo' => 'Logo',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
    
    public function getDocDetail()
    {
        return $this->hasOne(Documents::className(), ['DocId' => 'Logo']);
    }
}
