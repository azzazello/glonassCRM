<?php

class UserController extends Controller
{

    public $post;
    public $model = array();
    public $redirectUrl = 'edit';
    public $title = '�����������';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionRegistration()
    {
        $this->layout = "//layouts/login";
        $this->title = '�����������';

        $this->render('registration');
    }

}