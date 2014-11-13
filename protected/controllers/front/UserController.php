<?php

class UserController extends Controller
{

    public $post;
    public $model = array();
    public $redirectUrl = 'edit';
    public $title = 'Регистрация';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionRegistration()
    {
        $this->layout = "//layouts/login";
        $this->title = 'Регистрация';

        $this->render('registration');
    }

}