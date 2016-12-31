<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "EmployeeSkill".
 *
 * @property integer $Employeeskillid
 * @property integer $UserId
 * @property integer $SkillId
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property Skill $skill
 * @property AllUser $user
 */
class EmployeeSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EmployeeSkill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'SkillId', 'OnDate'], 'required'],
            [['UserId', 'SkillId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['SkillId'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['SkillId' => 'SkillId']],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Employeeskillid' => 'Employeeskillid',
            'UserId' => 'User ID',
            'SkillId' => 'Skill ID',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(Skill::className(), ['SkillId' => 'SkillId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'UserId']);
    }
}
