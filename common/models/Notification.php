<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Notification".
 *
 * @property integer $NotificationId
 * @property integer $JobId
 * @property integer $UserId
 * @property string $OnDate
 *
 * @property AllUser $user
 * @property PostJob $job
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobId', 'UserId'], 'required'],
            [['JobId', 'UserId'], 'integer'],
            [['OnDate'], 'safe'],
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
            'NotificationId' => 'Notification ID',
            'JobId' => 'Job ID',
            'UserId' => 'User ID',
            'OnDate' => 'On Date',
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
