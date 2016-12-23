<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Course".
 *
 * @property integer $CourseId
 * @property string $CourseName
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property Education[] $educations
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CourseName', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['CourseName'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CourseId' => 'Course ID',
            'CourseName' => 'Course Name',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'Added On',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['CourseId' => 'CourseId']);
    }
}
