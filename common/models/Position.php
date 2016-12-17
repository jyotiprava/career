<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Position".
 *
 * @property integer $PositionId
 * @property string $Position
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 *
 * @property Experience[] $experiences
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Position', 'IsDelete', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Position'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PositionId' => 'Position ID',
            'Position' => 'Position',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experience::className(), ['PositionId' => 'PositionId']);
    }
}
