<?php
namespace app\models;

use backend\models\Users;
use Yii;
use yii\base\Model;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [

            'username' => 'Email Address',
            'password' => 'Password'
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
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $username = '';
        $usertype = '';
        $fullname = '';
        $userid = '';
        $session = Yii::$app->session;

        if ($this->validate()) {
            $model = Users::find()
                ->where(['username' => $this->username])
                ->all();
            foreach ($model as $studentID){
                $usertype= $studentID['usertype'];
                $username= $studentID['username'];
                $fullname= $studentID['fullname'];
                $userid= $studentID['id'];
            }
            $session['user_type'] = $usertype;
            $session['user_name'] = $username;
            $session['full_name'] = $fullname;
            $session['user_id'] = $userid;

            $cookies = Yii::$app->response->cookies;

            $cookies->add(new \yii\web\Cookie([
                'name' => 'full_names',
                'value' => $fullname,
                'expire' => time() + 86400 * 365,
            ]));

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            //echo $this->username;
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }
}
