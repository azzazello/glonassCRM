<?php

class AjaxController extends Controller
{
    public $post;

    public function filters()
    {
        return array(
            'checkAccess'
        );
    }

    public  function  filterCheckAccess($filterChain){
        if(!Yii::app()->request->isAjaxRequest) return false;
        $filterChain->run();
        return true;
    }

    public function actionAjaxCheckLogin(){ //�������� ������� ������
            echo Users::checkDoubleLogin($_POST['login']);
    }

    public function actionAjaxCheckEmail(){ //�������� ������� email
            echo Users::checkDoubleEmail($_POST['email'],$_POST['edit']);
    }

    public function actionSendEmail(){  //�������� ������ �������������� ������
            if(!$model = Users::model()->find("`email`=:email",array(":email"=>$_POST['email']))) $this->ajaxMessages('������������ � ����� email �� ���������������');
            $model->generate = md5(rand(1000,9999));
            $model->save(false);
            $result = MYMail::MailerTo($model->email,'�������������� ������',$model,'//recovery')?'������ �� �������������� ������ ������� �� �����':'������ �������� ������';
            $this->ajaxMessages($result);
    }


    public function actionsavenewpassword(){

            if($_POST['password']!=$_POST['passwordRepeat']) $this->ajaxMessages('������ �� ���������');
            if(strlen($_POST['password'])<5) $this->ajaxMessages('���� ������ ������ ���� ������ 4 ��������');

            if(!$user=Users::model()->find("`id`=:id AND generate=:generate",array(":generate"=>$_POST['key'],":id"=>$_POST['id']))) $this->ajaxMessages('������ ��������� ������');

            $user->password = md5($_POST['password']);
            $user->save(false);
            $this->ajaxMessages('������ ������� �������');
    }

    public function actionsaveUser(){       //����� ���������� �������������
        $parse_str = array();
        parse_str($_POST['post'],$parse_str);
        foreach($parse_str as $k=>$v){
            $this->post[$k] = MYChtml::fromUTF8($v);// iconv("UTF-8","windows-1251",$v);
        }
        if(Users::checkDoubleLogin($this->post['login'])) $this->ajaxMessages('dphone');
        if(Users::checkDoubleEmail($this->post['email'])) $this->ajaxMessages('demail');
        if(!AccessoryFunctions::emailValidation($this->post['email'])) $this->ajaxMessages('femail');
        if($this->post['password']!=$this->post['password_repeat']) $this->ajaxMessages('dpassword');
        echo Users::saveUser($this->post);
    }

    public function actionconfirmAccount(){     //������������� �����������

        echo Forwebservices::confirmAccount($_POST['phone'],$_POST['code']);

    }

    public function  actionSendCodeRequest(){   //��������� �������� ����
        echo Forwebservices::newRequestShipping($_POST['phone']);

    }

}