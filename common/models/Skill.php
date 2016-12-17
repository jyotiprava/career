<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Skill".
 *
 * @property integer $SkillId
 * @property string $Skill
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property Education[] $educations
 * @property JobRelatedSkill[] $jobRelatedSkills
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Skill', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Skill'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SkillId' => 'Skill ID',
            'Skill' => 'Skill',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['SkillId' => 'SkillId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobRelatedSkills()
    {
        return $this->hasMany(JobRelatedSkill::className(), ['SkillId' => 'SkillId']);
    }
}
