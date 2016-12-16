<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Education".
 *
 * @property integer $EducationId
 * @property integer $UserId
 * @property string $HighestQualification
 * @property integer $CourseId
 * @property string $University
 * @property string $PassingYear
 * @property integer $SkillId
 * @property string $DurationFrom
 * @property string $DurationTo
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdateDate
 *
 * @property Skill $skill
 * @property Course $course
 * @property AllUser $user
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'HighestQualification', 'CourseId', 'University', 'PassingYear', 'SkillId', 'DurationFrom', 'DurationTo', 'IsDelete', 'OnDate'], 'required'],
            [['UserId', 'CourseId', 'SkillId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdateDate'], 'safe'],
            [['HighestQualification', 'University'], 'string', 'max' => 200],
            [['PassingYear'], 'string', 'max' => 50],
            [['DurationFrom', 'DurationTo'], 'string', 'max' => 20],
            [['SkillId'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['SkillId' => 'SkillId']],
            [['CourseId'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['CourseId' => 'CourseId']],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EducationId' => 'Education ID',
            'UserId' => 'User ID',
            'HighestQualification' => 'Highest Qualification',
            'CourseId' => 'Course ID',
            'University' => 'University',
            'PassingYear' => 'Passing Year',
            'SkillId' => 'Skill ID',
            'DurationFrom' => 'Duration From',
            'DurationTo' => 'Duration To',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdateDate' => 'Update Date',
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
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['CourseId' => 'CourseId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'UserId']);
    }
}
