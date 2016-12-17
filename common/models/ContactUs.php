<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ContactUs".
 *
 * @property integer $ContactId
 * @property string $ContactNumber
 * @property string $Email
 * @property string $ContactFrom
 * @property string $Message
 * @property string $Name
 * @property string $OnDate
 * @property string $UpdatedDate
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ContactUs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ContactNumber', 'Email', 'ContactFrom', 'Message', 'Name', 'OnDate'], 'required'],
            [['Message'], 'string'],
            [['OnDate', 'UpdatedDate'], 'safe'],
            [['ContactNumber'], 'string', 'max' => 12],
            [['Email'], 'string', 'max' => 150],
            [['ContactFrom'], 'string', 'max' => 100],
            [['Name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ContactId' => 'Contact ID',
            'ContactNumber' => 'Contact Number',
            'Email' => 'Email',
            'ContactFrom' => 'Contact From',
            'Message' => 'Message',
            'Name' => 'Name',
            'OnDate' => 'On Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
