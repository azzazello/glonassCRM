<?php

class MainController extends CController
{
	public $current = 'index';
    public $users;
    public $inSystemUrl = '/login';
    public $inSystem = false;


	public function actionIndex()
	{
       if( !Yii::app()->user->isGuest ){
           $this->inSystemUrl = '/login/exit';
           $this->inSystem = true;
       }

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

}