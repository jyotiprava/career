<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ShortlistedCandidate".
 *
 * @property integer $ShortlistId
 * @property integer $EmployerId
 * @property integer $UserId
 * @property integer $JobId
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property PostJob $job
 * @property AllUser $user
 * @property AllUser $employer
 */
class ShortlistedCandidate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ShortlistedCandidate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmployerId', 'UserId', 'JobId', 'IsDelete', 'OnDate'], 'required'],
            [['EmployerId', 'UserId', 'JobId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['JobId'], 'exist', 'skipOnError' => true, 'targetClass' => PostJob::className(), 'targetAttribute' => ['JobId' => 'JobId']],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
            [['EmployerId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['EmployerId' => 'UserId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ShortlistId' => 'Shortlist ID',
            'EmployerId' => 'Employer ID',
            'UserId' => 'User ID',
            'JobId' => 'Job ID',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(PostJob::className(), ['JobId' => 'JobId']);
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
    public function getEmployer()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'EmployerId']);
    }
}
