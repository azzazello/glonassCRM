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



}