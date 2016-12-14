<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $UserName;
    public $Password;
    public $email;
    public $rememberMe = true;
   // public $reCaptcha;
    //public $captcha;
    private $_user = null;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['UserName','Password'], 'required'],
           // ['captcha', 'captcha'],
            // rememberMe must be a boolean value
           // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LeZAxITAAAAAIPXV8-UxrbpiR98fVDEHpONJQMX'],
            // password is validated by validatePassword()
            ['Password', 'validatePassword'],
            ['Password', 'isApproved'],
                      
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->Password)) {

                $this->addError($attribute, 'Incorrect Username or Password.');

            }
            
        }
    }

     public function isApproved($attribute, $params){

        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if($user->IsDelete == 1)
                $this->addError($attribute, 'You account is not yet approved.');
        }
     }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->UserName);
            
        }

        return $this->_user;
    }
}
