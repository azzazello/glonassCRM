<?php

class AjaxController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public  function  actionLocality($code,$name)
    {
        if(Yii::app()->request->isAjaxRequest){

             Kladr::getLocalityInRegion($code,$name);
        }
    }
}