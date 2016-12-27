<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FooterThirdBlock".
 *
 * @property integer $Id
 * @property string $Heading
 * @property string $UpdatedDate
 */
class FooterThirdBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FooterThirdBlock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Heading'], 'required'],
            [['UpdatedDate'], 'safe'],
            [['Heading'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Heading' => 'Heading',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
