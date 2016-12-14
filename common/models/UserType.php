<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "UserType".
 *
 * @property integer $TypeId
 * @property string $TypeName
 * @property integer $IsDelete
 * @property string $Ondate
 * @property string $UpdatedDate
 *
 * @property User[] $users
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UserType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TypeName', 'IsDelete', 'Ondate'], 'required'],
            [['IsDelete'], 'integer'],
            [['Ondate', 'UpdatedDate'], 'safe'],
            [['TypeName'], 'string', 'max' => 100],
            [['TypeName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TypeId' => 'Type ID',
            'TypeName' => 'Type Name',
            'IsDelete' => 'Is Delete',
            'Ondate' => 'Ondate',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['TypeId' => 'TypeId']);
    }
}
