<?php

class  OrderController extends ControlerCPanel
{

    public function filterAccessControl($filterChain){

        $filterChain->run();
    }

    public function actionIndex()
    {
        $this->render('index');
    }


    public function actionInWork()
    {

        $requests = RequestShipping::model()->findAll("user_id=:id",array(":id"=>Users::getCurrUser()));
        $this->render('list',array("requests"=>$requests));
    }

}