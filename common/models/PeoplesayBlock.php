<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PeoplesayBlock".
 *
 * @property integer $Id
 * @property string $Heading
 * @property string $Content
 * @property string $UpdatedDate
 */
class PeoplesayBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PeoplesayBlock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Heading', 'Content'], 'required'],
            [['Content'], 'string'],
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
            'Content' => 'Content',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
