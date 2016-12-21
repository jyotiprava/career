<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PostJob".
 *
 * @property integer $JobId
 * @property string $JobTitle
 * @property integer $Location
 * @property string $Salary
 * @property string $Experience
 * @property string $JobType
 * @property string $CompanyName
 * @property string $Email
 * @property string $Phone
 * @property string $Website
 * @property string $Country
 * @property string $State
 * @property string $City
 * @property integer $NoofVacancy
 * @property string $JobShift
 * @property string $JobDescription
 * @property string $JobSpecification
 * @property string $TechnicalGuidance
 * @property integer $LogoId
 * @property integer $EmployerId
 * @property integer $JobCategoryId
 * @property integer $PositionId
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property AppliedJob[] $appliedJobs
 * @property JobRelatedSkill[] $jobRelatedSkills
 * @property ShortlistedCandidate[] $shortlistedCandidates
 */
class PostJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PostJob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobTitle', 'Location', 'Salary', 'Experience', 'JobType', 'CompanyName', 'Email', 'Phone', 'Website', 'Country', 'State', 'City', 'NoofVacancy', 'JobShift', 'JobDescription', 'JobSpecification', 'TechnicalGuidance', 'LogoId', 'EmployerId', 'JobCategoryId', 'PositionId', 'OnDate'], 'required'],
            [['LogoId', 'EmployerId', 'JobCategoryId', 'PositionId', 'IsDelete'], 'integer'],
            [['Website', 'JobDescription', 'JobSpecification', 'TechnicalGuidance'], 'string'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['JobTitle', 'Experience', 'CompanyName'], 'string', 'max' => 200],
            [['Salary', 'Email', 'JobShift'], 'string', 'max' => 150],
            [['JobType', 'Country', 'State', 'City'], 'string', 'max' => 100],
            [['Location'],'string','max'=>400],
            [['Phone'], 'string', 'max' => 12],
            [['NoofVacancy'],'string','max'=>20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JobId' => 'Job ID',
            'JobTitle' => 'Job Title',
            'Location' => 'Location',
            'Salary' => 'Salary',
            'Experience' => 'Experience',
            'JobType' => 'Job Type',
            'CompanyName' => 'Company Name',
            'Email' => 'Email',
            'Phone' => 'Phone',
            'Website' => 'Website',
            'Country' => 'Country',
            'State' => 'State',
            'City' => 'City',
            'NoofVacancy' => 'Noof Vacancy',
            'JobShift' => 'Job Shift',
            'JobDescription' => 'Job Description',
            'JobSpecification' => 'Job Specification',
            'TechnicalGuidance' => 'Technical Guidance',
            'LogoId' => 'Logo ID',
            'EmployerId' => 'Employer ID',
            'JobCategoryId' => 'Job Category ID',
            'PositionId' => 'Position ID',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppliedJobs()
    {
        return $this->hasMany(AppliedJob::className(), ['JobId' => 'JobId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobRelatedSkills()
    {
        return $this->hasMany(JobRelatedSkill::className(), ['JobId' => 'JobId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShortlistedCandidates()
    {
        return $this->hasMany(ShortlistedCandidate::className(), ['JobId' => 'JobId']);
    }
}
