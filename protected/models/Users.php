<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
    public $Model;
    public $data;

    public $post;
    public $model;
    public $oldPassword;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function relations()
    {
        return array(
            'requestShippings' => array(self::HAS_MANY, 'RequestShipping', 'user_id'),
        );
    }

    public function defaultScope()
    {
        return array(
            'condition'=> "`confirm`!=0"
        );
    }

    public function getUsersModel($id = null){
        $this->Model = ($id)? Users::model()->findByPk((int)$id) :  new Users;
        return $this->Model;
    }

    public static function saveUser($post){        //Сохранение пользователей

        $url = 'http://192.168.0.224:9994/json/reply/SignUpRequestV1';
        $params = array(
            'Phone' =>  AccessoryFunctions::clearTel($post['login']),
            'Password' => $post['password'],
            'Name' => $post['name'],
            'Occupation' => 3,
            'Company' => $post['company'],
            'Email' => $post['email'],
            'Skype' => $post['skype']
        );
        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        $date = json_decode($result);
        return $date->Status;
    }



  /* public function saveParams(){
        $this->oldPassword = $this->Model->password;
        $this->Model->attributes = $this->data;
      //  $this->Model->mobile_version = 0;
        $this->Model->company = iconv("UTF-8","windows-1251",$this->data['company']);
        $this->Model->name = iconv("UTF-8","windows-1251",$this->data['name']);
        $this->Model->skype = iconv("UTF-8","windows-1251",$this->data['skype']);
      //  $this->Model->mobile_platform = 0;
        $this->Model->login = AccessoryFunctions::clearTel($this->data['login']);
        if(strlen($this->data['password'])>0)  $this->Model->password = md5($this->data['password']);
        else $this->Model->password = $this->oldPassword;
    }*/

  /*  public function saveUser(){
       // $this->Model->saveParams();
        return $this->SignUpRequest();
       // return ($this->Model->save())?true:false;
    }*/

    public static function getAllByCriteria($table,$criteria = null){
        $criteria = $criteria?$criteria:new CDbCriteria;
        return CActiveRecord::model($table)->findAll($criteria);
    }

    public static function checkDoubleLogin($login){
        return Users::model()->resetScope()->count("login=:login",array(":login"=>AccessoryFunctions::clearTel($login)));
    }

    public static function checkDoubleEmail($email){
        return Users::model()->resetScope()->count("email=:email",array(":email"=>$email));
    }

}