<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "AppliedJob".
 *
 * @property integer $ApplJobId
 * @property integer $JobId
 * @property integer $UserId
 * @property string $OnDate
 * @property string $Status
 * @property integer $IsDelete
 * @property string $UpdatedDate
 *
 * @property AllUser $user
 * @property PostJob $job
 */
class AppliedJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AppliedJob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobId', 'UserId', 'OnDate', 'Status', 'IsDelete'], 'required'],
            [['JobId', 'UserId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Status'], 'string', 'max' => 100],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
            [['JobId'], 'exist', 'skipOnError' => true, 'targetClass' => PostJob::className(), 'targetAttribute' => ['JobId' => 'JobId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ApplJobId' => 'Appl Job ID',
            'JobId' => 'Job ID',
            'UserId' => 'User ID',
            'OnDate' => 'On Date',
            'Status' => 'Status',
            'IsDelete' => 'Is Delete',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'UserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(PostJob::className(), ['JobId' => 'JobId']);
    }
}
