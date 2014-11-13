<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
    public $Model;
    public $data;

    public $post;
    public $model;
    public $oldpassword = false;

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

    public static function saveUser($post){        //Ñîõğàíåíèå ïîëüçîâàòåëåé

        return Forwebservices::SignUpRequestV1($post);

    }

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

    public static  function getCurrUser(){
        return 1;
    }

    public function editProfile(){
        $this->Model->attributes = $this->data;
        $this->Model->password = !$this->oldpassword? md5($this->data['password']) : $this->oldpassword;
        $this->Model->login = AccessoryFunctions::clearTel( $this->data['login'] );
        return $this->Model->save();
    }

}