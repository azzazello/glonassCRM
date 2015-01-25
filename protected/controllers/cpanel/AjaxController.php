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

    public function actionSaveact() {

        $actNum = $_GET["actNum"];
        $deviceId = $_GET["deviceId"];
        $plate = $_GET["plate"];

        $truck = Trucks::model()->find("plate=:plate",array(":plate"=>$plate));
       // $truck = new Trucks();
        if ($truck) {
            $truck->act_number = $actNum;
            $truck->is_act = 1;
            BNComplex::changeIdDevice($truck->glonass->device_id, $deviceId);
            $truck->glonass->device_id = $deviceId;
            $truck->save();
            if ($truck->glonass->save() ) echo "good"; else   echo "bad";

        }

    }

    public function actionCheckconnect() {
        $devId = $_GET["devId"];
       echo BNComplex::checkConnect($devId);
    }

    public function actionGetPayments($id) {
      $truck = Trucks::model()->findByPK($id);

            echo CJSON::encode($truck->payments);

    }

    public function actionSaveAddFee() {

            $dates = $_GET["dates"];
            $amountAddFee = $_GET["amountAddFee"];
            $plate = $_GET["plateAddFee"];
            if (Payments::addBalanceFee($amountAddFee,$plate, $dates)) {
                echo "good";
            } else {
                echo "bad";
            }
    }
    public function actionCheckzreport() {
        $date = $_GET["date"];
        $zreport = ZReport::model()->findAll("date=:date",array(":date"=>$date));
        if ($zreport) {  CJSON::encode($zreport); } else echo "false";


    }
}