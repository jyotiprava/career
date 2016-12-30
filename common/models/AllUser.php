<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "AllUser".
 *
 * @property integer $UserId
 * @property integer $UserTypeId
 * @property string $EntryType
 * @property string $Name
 * @property string $Email
 * @property string $MobileNo
 * @property string $Address
 * @property string $Country
 * @property string $State
 * @property string $City
 * @property string $PinCode
 * @property string $Password
 * @property integer $CVId
 * @property string $CompanyDesc
 * @property integer $IndustryId
 * @property integer $PhotoId
 * @property integer $IsDelete
 * @property string $Ondate
 * @property string $UpdatedDate
 *
 * @property Documents $cV
 * @property Industry $industry
 * @property Documents $photo
 * @property UserType $userType
 * @property AppliedJob[] $appliedJobs
 * @property Education[] $educations
 * @property Experience[] $experiences
 * @property ShortlistedCandidate[] $shortlistedCandidates
 * @property ShortlistedCandidate[] $shortlistedCandidates0
 */
class AllUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AllUser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['UserTypeId', 'EntryType', 'Name', 'Email', 'MobileNo', 'Address', 'Country', 'State', 'City', 'PinCode', 'Password', 'Ondate'], 'required'],
            [['UserTypeId', 'CVId', 'IndustryId', 'PhotoId', 'IsDelete','VerifyStatus','ForgotStatus'], 'integer'],
            [['CompanyDesc'], 'string'],
            [['Ondate', 'UpdatedDate'], 'safe'],
            [['EntryType', 'Country', 'State', 'City'], 'string', 'max' => 100],
            [['Name', 'Email'], 'string', 'max' => 200],
            [['MobileNo'], 'string', 'max' => 12],
            [['PinCode'], 'string', 'max' => 6],
            [['Password'], 'string', 'max' => 150],
            [['VerifyKey','ContactNo'], 'string', 'max' => 400],
           // [['CVId'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::className(), 'targetAttribute' => ['CVId' => 'DocId']],
          //  [['IndustryId'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['IndustryId' => 'IndustryId']],
          //  [['PhotoId'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::className(), 'targetAttribute' => ['PhotoId' => 'DocId']],
           // [['LogoId'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::className(), 'targetAttribute' => ['LogoId' => 'DocId']],
            [['UserTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['UserTypeId' => 'TypeId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UserId' => 'User ID',
            'UserTypeId' => 'User Type ID',
            'EntryType' => 'Entry Type',
            'Name' => 'Name',
            'Email' => 'Email',
            'MobileNo' => 'Mobile No',
            'ContactNo'=>'Contact No',
            'Address' => 'Address',
            'Country' => 'Country',
            'State' => 'State',
            'City' => 'City',
            'PinCode' => 'Pin Code',
            'Password' => 'Password',
            'CVId' => 'Cvid',
            'CompanyDesc' => 'Company Desc',
            'IndustryId' => 'Industry ID',
            'PhotoId' => 'Photo ID',
            'LogoId' => 'Logo ID',
            'IsDelete' => 'Is Delete',
            'Ondate' => 'Ondate',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCV()
    {
        return $this->hasOne(Documents::className(), ['DocId' => 'CVId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['IndustryId' => 'IndustryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(Documents::className(), ['DocId' => 'PhotoId']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogo()
    {
        return $this->hasOne(Documents::className(), ['DocId' => 'LogoId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['TypeId' => 'UserTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppliedJobs()
    {
        return $this->hasMany(AppliedJob::className(), ['UserId' => 'UserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['UserId' => 'UserId']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpRelatedSkills()
    {
        return $this->hasMany(EmployeeSkill::className(), ['UserId' => 'UserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experience::className(), ['UserId' => 'UserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShortlistedCandidates()
    {
        return $this->hasMany(ShortlistedCandidate::className(), ['UserId' => 'UserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShortlistedCandidates0()
    {
        return $this->hasMany(ShortlistedCandidate::className(), ['EmployerId' => 'UserId']);
    }
}
