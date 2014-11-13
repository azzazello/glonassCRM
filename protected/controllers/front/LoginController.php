<?php

class LoginController extends Controller
{
		public $layout='//layouts/login';
        public $password;
        public $password_repeat;
        public $repeat = true;
        public $title = 'Вход';

        public function inCabinet(){
            $this->redirect($this->createUrl('/cpanel/'));
        }

        public function actionIndex()
        {
            if (!Yii::app()->user->isGuest) $this->inCabinet();

            $model = new LoginForm;

            if (isset($_POST['LoginForm'])){
                $model->attributes = $_POST['LoginForm'];

                $valid = $model->validate();
                if ($valid && $model->authenticate()){
                   $this->inCabinet();
                }
                $this->message = 'Не верный логин или пароль';
            }
            $this->render('index', array('model' => $model));
        }

        public function redirection($url,$array){
            $this->redirect( $this->createUrl($url,$array) );
        }

        public function actionrecovery(){
            $this->render('recovery');
        }

        public function actionnewpassword(){

            $this->title = 'Восстановление пароля';
            if(Users::model()->find("`id`=:id AND generate=:generate",array(":generate"=>$_GET['generate'],":id"=>$_GET['id']))){
                $this->render('newpassword',array('id'=>$_GET['id']));
            }else $this->redirect( $this->createUrl('index',array('error'=>'recovery')) );

        }


	    public function actionExit()
	    {
	        Yii::app()->user->logout();
	        $this->redirect($this->createUrl("/main"));
	    }
}