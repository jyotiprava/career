<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "JobCategory".
 *
 * @property integer $JobCategoryId
 * @property string $CategoryName
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class JobCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'JobCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoryName', 'IsDelete', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['CategoryName'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JobCategoryId' => 'Job Category ID',
            'CategoryName' => 'Category Name',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
