<?php

class UserController extends Controller
{
    public $password;
    public $password_repeat;
    public $repeat = true;
    public $post;
    public $model = array();
    public $redirectUrl = 'edit';
    public $title = 'Регистрация';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionEdit()
    {
        $this->isGuest();

        $this->getModel( Yii::app()->user->getId() );

        if(Yii::app()->request->isPostRequest) $this->saveUser();

        $this->render('edit',array('errors'=>$this->model->getErrors()));
    }



    public function getModel($id = null){
        $model = new Users;
        $this->model = $model->getUsersModel( $id );
        $this->model->Model = $this->model;
    }

    public function actionRegistration()
    {
        $this->layout = "//layouts/login";
        $this->title = 'Регистрация';

        $this->render('registration');
    }

}