<?php

class RatingController extends ControlerCPanel
{
    public $errors;
    public $ratings;
    public $model = 'Rating';

	public function actionIndex()
	{
        $this->criteria = Rating::criteriaForGetMyRating();
        $this->getPagination();
        $this->ratings = Rating::getMyRatings($this->criteria);
		$this->render('index');
    }

    public function checkUserId($user = null){
        if(!$user) $this->redirectToMain();
    }

    public function actionComments(){
        $this->comments = Rating::getMyComments();
        $this->render('comments');
    }
    public function actiondeleteRating(){
        if(Yii::app()->request->isAjaxRequest){
            $result = Rating::deleteRating($_POST['id'])?'true':'false';
            $this->renderPartial($this->$result);
        }
    }

    public function actionsaveRating(){
        if(Yii::app()->request->isAjaxRequest){
            $result = Rating::editRating($_POST)?'true':'false';
            $this->renderPartial($this->$result);
        }
    }

    public function actioneditRating(){
        if(Yii::app()->request->isAjaxRequest){
            if(!$rating = Rating::getRecordForEdit($_POST['id'])) $this->renderFalse();
            $this->renderPartial('render/edit',array('rating'=>$rating));
        }
    }


}