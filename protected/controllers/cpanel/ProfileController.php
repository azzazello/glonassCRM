<?php

class  ProfileController extends ControlerCPanel
{
    public $model;
    public $result;
    public $oldModel = false;
    public $repeat = true;

    public function filterAccessControl($filterChain){

        $filterChain->run();
    }

    public function actionIndex()
    {
        $this->getModel( Yii::app()->user->getId() );
        if(Yii::app()->request->isPostRequest){
            $this->saveUser();
        }
        $this->render('index',array('errors'=>$this->model->getErrors()));
    }

    public function getModel($id = null){
        $model = new Users;
        $this->model = $model->getUsersModel( $id );
        $this->model->Model = $this->model;
    }

    public function checkRepeatPassword(){
        if($_POST['password']!=$_POST['password_repeat']) $this->repeat = false;
    }

    public function saveUser(){
        $this->checkRepeatPassword();
        $this->model->data = $_POST;
        if(strlen($_POST['password'])==0) $this->model->oldpassword = $this->model->password;
        if($this->repeat && $this->model->editProfile()) $this->redirect( $this->createUrl('.',array("save"=>'ok')) );
        return false;
    }

}