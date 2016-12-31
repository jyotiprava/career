<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "EmpNotification".
 *
 * @property integer $EmpnId
 * @property integer $EmpId
 * @property integer $UserId
 * @property integer $JobId
 * @property integer $IsView
 * @property string $OnDate
 *
 * @property PostJob $job
 * @property AllUser $user
 * @property AllUser $emp
 */
class EmpNotification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EmpNotification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmpId', 'UserId', 'JobId', 'IsView'], 'required'],
            [['EmpId', 'UserId', 'JobId', 'IsView'], 'integer'],
            [['OnDate'], 'safe'],
            [['JobId'], 'exist', 'skipOnError' => true, 'targetClass' => PostJob::className(), 'targetAttribute' => ['JobId' => 'JobId']],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
            [['EmpId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['EmpId' => 'UserId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EmpnId' => 'Empn ID',
            'EmpId' => 'Emp ID',
            'UserId' => 'User ID',
            'JobId' => 'Job ID',
            'IsView' => 'Is View',
            'OnDate' => 'On Date',
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
    public function getEmp()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'EmpId']);
    }
}
