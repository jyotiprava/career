<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "JobRelatedSkill".
 *
 * @property integer $JobRelatedSkillId
 * @property integer $JobId
 * @property integer $SkillId
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property Skill $skill
 * @property PostJob $job
 */
class JobRelatedSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'JobRelatedSkill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobId', 'SkillId', 'IsDelete', 'OnDate'], 'required'],
            [['JobId', 'SkillId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['SkillId'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['SkillId' => 'SkillId']],
            [['JobId'], 'exist', 'skipOnError' => true, 'targetClass' => PostJob::className(), 'targetAttribute' => ['JobId' => 'JobId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JobRelatedSkillId' => 'Job Related Skill ID',
            'JobId' => 'Job ID',
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
    public function getJob()
    {
        return $this->hasOne(PostJob::className(), ['JobId' => 'JobId']);
    }
}
