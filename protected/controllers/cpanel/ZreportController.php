<?php

class ZreportController extends ControlerCPanel
{


    public function actionIndex()
    {

        $zreports = ZReport::model()->findAll(array("order"=>"date"));
        $this->render('index',array("zreports"=>$zreports));
    }







}