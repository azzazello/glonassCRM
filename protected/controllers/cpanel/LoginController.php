<?php

class LoginController extends Controller
{
		public $layout='//layouts/login';

        public function filterAccessControl($filterChain){

            $filterChain->run();
        }

		public function actionIndex()
		{
			$this->render('index');
		}
		

	    public function actionGet()
	    {


                $tel = AccessoryFunctions::clearTel($_POST['tel']);

                if (!$user = Users::model()->find("login=:login ",array(":login"=>$tel))){

                    $this->redirect($this->createUrl("index",array("tel"=>1)));

                }

			   if(isset($_POST['rememberMe'])) Yii::app()->session["rememberMe"] = true;

                $identity=new UserIdentity($tel, $_POST["pass"]);

                if ($identity->authenticate()){

                    $duration=(isset(Yii::app()->session["rememberMe"]))? 3600*24*365 : 0; // 30 days

                    Yii::app()->user->login($identity,$duration);

                    $this->redirect($this->createUrl("/admin"));

                } else $this->redirect($this->createUrl("index",array("badpass"=>1)));

	    }

	
	    public function actionEnter()
	    {


	    }

	
	    public function actionExit()
	    {
	        Yii::app()->user->logout();
	        $this->redirect($this->createUrl("/login/index"));
	    }

}