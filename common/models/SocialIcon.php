<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "SocialIcon".
 *
 * @property integer $Id
 * @property integer $IsTwitter
 * @property string $TwitterLink
 * @property integer $IsFacebook
 * @property string $FacebookLink
 * @property integer $IsLinkedin
 * @property string $LinkedinLink
 * @property integer $IsGoogleplus
 * @property string $GoogleplusLink
 * @property string $UpdatedDate
 */
class SocialIcon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SocialIcon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['IsTwitter', 'TwitterLink', 'IsFacebook', 'FacebookLink', 'IsLinkedin', 'LinkedinLink', 'IsGoogleplus', 'GoogleplusLink'], 'required'],
            [['IsTwitter', 'IsFacebook', 'IsLinkedin', 'IsGoogleplus'], 'integer'],
            [['UpdatedDate'], 'safe'],
            [['TwitterLink', 'FacebookLink', 'LinkedinLink', 'GoogleplusLink'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IsTwitter' => 'Is Twitter',
            'TwitterLink' => 'Twitter Link',
            'IsFacebook' => 'Is Facebook',
            'FacebookLink' => 'Facebook Link',
            'IsLinkedin' => 'Is Linkedin',
            'LinkedinLink' => 'Linkedin Link',
            'IsGoogleplus' => 'Is Googleplus',
            'GoogleplusLink' => 'Googleplus Link',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
