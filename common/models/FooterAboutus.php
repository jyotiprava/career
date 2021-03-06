<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FooterAboutus".
 *
 * @property integer $Id
 * @property string $Heading
 * @property string $Content
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class FooterAboutus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FooterAboutus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Heading', 'Content', 'IsDelete', 'OnDate'], 'required'],
            [['Content'], 'string'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Heading'], 'string', 'max' => 300],
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
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
