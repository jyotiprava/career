<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FooterDevelopedblock".
 *
 * @property integer $Id
 * @property string $Content
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class FooterDevelopedblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FooterDevelopedblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Content', 'IsDelete', 'OnDate'], 'required'],
            [['Content'], 'string'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Content' => 'Content',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
