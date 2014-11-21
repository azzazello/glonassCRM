<?php

class RatingController extends Controller
{
    public $errors;
    public $comments;
    public $inSystem = false;

	public function actionIndex()
	{
        $this->checkUserId($_GET['user']);

        if( !Yii::app()->user->isGuest ) $this->inSystem = true;

        if(Yii::app()->request->isPostRequest){
            $this->isGuest();
            $data = $_POST;
            $data['user_id_for'] = $_GET['user'];
            $result = Rating::add($data);
            if($result=='ok') $this->redirect( $this->createUrl('index',array('user'=>$_GET['user'],'save'=>'ok')) );
            else $this->errors = $result;
        }
		$this->render('index');
    }

    public function checkUserId($user = null){
        if(!$user) $this->redirectToMain();
    }

    public function actionComments(){
        $this->comments = Rating::getMyComments();
        $this->render('comments');
    }

   /* public function actiondeleteComment(){
        if(Yii::app()->request->isAjaxRequest){
            $result = Rating::deleteComment($_POST['id'])?'true':'false';
            $this->renderPartial($this->$result);
        }
    }

    public function actionsaveComment(){
        if(Yii::app()->request->isAjaxRequest){
            $result = Rating::editComment($_POST)?'true':'false';
            $this->renderPartial($this->$result);
        }
    }*/

}