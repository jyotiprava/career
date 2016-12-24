<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PostJob".
 *
 * @property integer $JobId
 * @property string $JobTitle
 * @property string $Location
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
 * @property string $NoofVacancy
 * @property string $JobShift
 * @property string $JobDescription
 * @property string $JobSpecification
 * @property string $TechnicalGuidance
 * @property integer $LogoId
 * @property integer $EmployerId
 * @property integer $JobCategoryId
 * @property integer $PositionId
 * @property integer $JobStatus
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property AppliedJob[] $appliedJobs
 * @property JobRelatedSkill[] $jobRelatedSkills
 * @property Position $position
 * @property AllUser $employer
 * @property JobCategory $jobCategory
 * @property ShortlistedCandidate[] $shortlistedCandidates
 */
class PostJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $cnt,$CategoryName;
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
            [['JobTitle', 'Location', 'Salary', 'Experience', 'JobType', 'CompanyName', 'Email', 'Phone', 'Website', 'Country', 'State', 'City', 'NoofVacancy', 'JobShift', 'JobDescription', 'JobSpecification', 'TechnicalGuidance', 'LogoId', 'EmployerId', 'JobCategoryId', 'PositionId',  'OnDate'], 'required'],
            [['JobTitle', 'Website', 'JobDescription', 'JobSpecification', 'TechnicalGuidance'], 'string'],
            [['LogoId', 'EmployerId', 'JobCategoryId', 'PositionId', 'JobStatus', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Location'], 'string', 'max' => 400],
            [['Salary', 'Email', 'JobShift'], 'string', 'max' => 150],
            [['Experience', 'CompanyName'], 'string', 'max' => 200],
            [['JobType', 'Country', 'State', 'City'], 'string', 'max' => 100],
            [['Phone'], 'string', 'max' => 12],
            [['NoofVacancy'], 'string', 'max' => 20],
            [['PositionId'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['PositionId' => 'PositionId']],
            [['EmployerId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['EmployerId' => 'UserId']],
            [['JobCategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => JobCategory::className(), 'targetAttribute' => ['JobCategoryId' => 'JobCategoryId']],
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
            'JobStatus' => 'Job Status',
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
    public function getDocDetail()
    {
        return $this->hasOne(Documents::className(), ['DocId' => 'LogoId']);
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
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['PositionId' => 'PositionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(AllUser::className(), ['UserId' => 'EmployerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCategory()
    {
        return $this->hasOne(JobCategory::className(), ['JobCategoryId' => 'JobCategoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShortlistedCandidates()
    {
        return $this->hasMany(ShortlistedCandidate::className(), ['JobId' => 'JobId']);
    }
}
