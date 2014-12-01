<?php

class MainController extends Controller
{
	public $current = 'index';
    public $users;
    public $inSystem = false;


	public function actionIndex()
	{
       if( !Yii::app()->user->isGuest ) $this->inSystem = true;


        $this->users = General::findAllByCriteria('Users');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'



		$this->render('index');
	}

    public function actionCreaterequest()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('/forms/requestshipping');
    }

    public function getErrors() {}


    public  function actionPlans(){

        $this->render("plans");
    }

    public function actionContacts() {
        $this->render("contacts");

    }

    public function actionOrders() {
        $result = RequestShipping::model()->findAll();
        $this->render("list",array("result"=>$result));
    }
}