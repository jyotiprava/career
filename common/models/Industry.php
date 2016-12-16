<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Industry".
 *
 * @property integer $IndustryId
 * @property string $IndustryName
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property AllUser[] $allUsers
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IndustryName', 'IsDelete', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['IndustryName'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IndustryId' => 'Industry ID',
            'IndustryName' => 'Industry Name',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllUsers()
    {
        return $this->hasMany(AllUser::className(), ['IndustryId' => 'IndustryId']);
    }
}
