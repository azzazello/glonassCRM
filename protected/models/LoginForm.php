<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 21.11.12
 * Time: 1:47
 * To change this template use File | Settings | File Templates.
 */
class loginForm extends CFormModel
{

    public $login;
    public $password;
    public $rememberMe = true;
    private $_identity;

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }


    public function authenticate() {
        /** @var $login ���������� ��������� ������������ this->rules()*/
        /** @var $password ���������� ��������� ������������ this->rules()*/
        $identity=new UserIdentity($this->login, $this->password);
        $identity->authenticate();

        $duration=($_POST['loginForm']['rememberMe'])?3600*24*30:false; // 30 days

        switch($identity->errorCode)
        {
            case UserIdentity::ERROR_NONE: Yii::app()->user->login($identity,$duration); return true; break;
            case UserIdentity::ERROR_PASSWORD_INVALID: $this->addError('login','������������ ��� ������������ ��� ������.'); return false;    break;
            case UserIdentity::ERROR_USERNAME_INVALID: $this->addError('password','������������ ��� ������������ ��� ������.'); return false;     break;
        }
    }

    public function attributeLabels()
    {
        return array(
            'password'=>'������.',
            'login'=>'�����.',
        );
    }






}
