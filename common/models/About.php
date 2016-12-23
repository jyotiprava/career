<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "About".
 *
 * @property integer $AboutId
 * @property string $AboutUsContent
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'About';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AboutUsContent', 'OnDate'], 'required'],
            [['AboutUsContent'], 'string'],
            [['OnDate', 'UpdatedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AboutId' => 'About ID',
            'AboutUsContent' => 'About Us Content',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
