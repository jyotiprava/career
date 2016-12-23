<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "NewsLetter".
 *
 * @property integer $NewsLetterId
 * @property string $Email
 * @property integer $IsDelete
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class NewsLetter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NewsLetter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Email', 'IsDelete', 'OnDate'], 'required'],
            [['IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['Email'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NewsLetterId' => 'News Letter ID',
            'Email' => 'Email',
            'IsDelete' => 'Is Delete',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
