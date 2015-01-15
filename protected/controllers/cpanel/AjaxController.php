<?php

class AjaxController extends ControlerCPanel
{

	public function actionIndex()
	{
		$this->render('index');
	}


    public function actionGetpaymentsforzreport($id){

      $zreport = ZReport::model()->findByPK($id);
      $result = Payments::model()->findAll("date=:date",array(":date"=>$zreport->date));
      echo CJSON::encode($result);

    }

    public function actionCheckplate($plate){
        if (Trucks::checkPlate(MYChtml::fromUTF8($plate))) echo "true"; else echo "false";
    }
}