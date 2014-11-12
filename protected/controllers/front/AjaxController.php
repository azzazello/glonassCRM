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

    public function actionAjaxCheckLogin(){ //Проверка дубляжа логина
            echo Users::checkDoubleLogin($_POST['login']);
    }

    public function actionAjaxCheckEmail(){ //Проверка дубляжа email
            echo Users::checkDoubleEmail($_POST['email']);
    }

    public function actionSendEmail(){  //Отправка письма восстановления пароля
            if(!$model = Users::model()->find("`email`=:email",array(":email"=>$_POST['email']))) $this->ajaxMessages('Пользователь с таким email не зарегестрирован');
            $model->generate = md5(rand(1000,9999));
            $model->save(false);
            $result = MYMail::MailerTo($model->email,'Восстановление пароля',$model,'//recovery')?'Ссылка на восстановление пароля выслана на почту':'Ошибка отправки письма';
            $this->ajaxMessages($result);
    }


    public function actionsavenewpassword(){

            if($_POST['password']!=$_POST['passwordRepeat']) $this->ajaxMessages('Пароли не совпадают');
            if(strlen($_POST['password'])<5) $this->ajaxMessages('Поле Пароль должно быть длинее 4 символов');

            if(!$user=Users::model()->find("`id`=:id AND generate=:generate",array(":generate"=>$_POST['key'],":id"=>$_POST['id']))) $this->ajaxMessages('Ошибка изменения пароля');

            $user->password = md5($_POST['password']);
            $user->save(false);
            $this->ajaxMessages('Пароль изменен успешно');
    }

    public function actionsaveUser(){       //Метод сохранения пользователей
        $parse_str = array();
        parse_str($_POST['post'],$parse_str);
        foreach($parse_str as $k=>$v){
            $this->post[$k] = iconv("UTF-8","windows-1251",$v);
        }
        if(Users::checkDoubleLogin($this->post['login'])) $this->ajaxMessages('dphone');
        if(Users::checkDoubleEmail($this->post['email'])) $this->ajaxMessages('demail');
        if(!AccessoryFunctions::emailValidation($this->post['email'])) $this->ajaxMessages('femail');
        if($this->post['password']!=$this->post['password_repeat']) $this->ajaxMessages('dpassword');
        echo Users::saveUser($this->post);
    }

    public function actionconfirmAccount(){     //Подтверждение регистрации
        $url = 'http://192.168.0.224:9994/json/reply/ActivateAccountRequest';
        $params = array(
            'Phone' => AccessoryFunctions::clearTel($_POST['phone']),
            'Code' => $_POST['code']
        );
        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        echo $result;
    }

    public function  actionSendCodeRequest(){
            $url = 'http://192.168.0.224:9994/json/reply/SendCodeRequest';
            $params = array(
                'Phone' => AccessoryFunctions::clearTel($_POST['phone'])
            );
            $result = file_get_contents($url, false, stream_context_create(array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($params)
                )
            )));
        echo $result;
    }

}