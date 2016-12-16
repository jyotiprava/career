<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Experience".
 *
 * @property integer $ExperienceId
 * @property integer $UserId
 * @property string $CompanyName
 * @property integer $PositionId
 * @property string $YearFrom
 * @property string $YearTo
 * @property string $Experience
 * @property string $Salary
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property AllUser $user
 * @property Position $position
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'CompanyName', 'PositionId', 'YearFrom', 'YearTo', 'Experience', 'Salary', 'IsDelete', 'OnDate'], 'required'],
            [['UserId', 'PositionId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['CompanyName', 'Experience'], 'string', 'max' => 150],
            [['YearFrom', 'YearTo'], 'string', 'max' => 20],
            [['Salary'], 'string', 'max' => 100],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => AllUser::className(), 'targetAttribute' => ['UserId' => 'UserId']],
            [['PositionId'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['PositionId' => 'PositionId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ExperienceId' => 'Experience ID',
            'UserId' => 'User ID',
            'CompanyName' => 'Company Name',
            'PositionId' => 'Position ID',
            'YearFrom' => 'Year From',
            'YearTo' => 'Year To',
            'Experience' => 'Experience',
            'Salary' => 'Salary',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
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
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['PositionId' => 'PositionId']);
    }
}
