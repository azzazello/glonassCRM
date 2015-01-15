<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;


    public function authenticate()
    {

        $this->_id=1;
        $this->errorCode=self::ERROR_NONE;
        return $this->errorCode==self::ERROR_NONE;


		$users = Users::model()->find("LOWER(login)=:username and password=:password",array(":username"=>AccessoryFunctions::clearTel($this->username), ":password"=>md5($this->password)));

        if($users===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        else
        {
            $this->_id=$users->id;
            $users->last_in = new CDbExpression('NOW()');
            $users->mobile_platform = 0;
            $users->mobile_version = 0;
            $users->save();
            Yii::app()->user->setState("name", $users->name);
            Yii::app()->user->setState("occupation", $users->MobileUserRole->occupation);
            $this->errorCode=self::ERROR_NONE;
        }

        return $this->errorCode==self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
	

}
