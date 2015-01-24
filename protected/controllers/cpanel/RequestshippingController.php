<?php

class RequestshippingController extends ControlerCPanel
{
    public $errorSave = array(
        1=>"������� ������� ���� ������ ��������",
        2=>"������� ������� ���� ��������� ������ ������",
        3=>"������� ������ ������ ��������",
        4=>"������� ������ ���������� ����� ��������",
        5=>"������� ������� ����� ��������",
        6=>"������� ������� ����������",
        7=>"������� ������� ��������",
        8=>"������� ������ �������",
        9=>"������� ������� ����",
        10=>"������� ������� ��������� ����� �� ��������",
        11=>"������� ������ ��� ��������",
        12=>"������� ������ ����� ���������",
        13=>"������� ������� ����� �������",
        14=>"������� ������ ��������",
    );



	public function actionIndex()
	{
		$this->render('index');
	}




    public function actionCreate()
    {
        if ($_GET["select"] == 1) {

            //print_r($_POST);
            if (!Trucks::checkPlate($_POST["plate"])) {
                $truck = new Trucks();
               // print_r($_POST);
                $truck->plate = MYChtml::check_num($_POST["plate"]);
               /* if (strlen($data[1]) > 4) {$truck->is_conctract = 1; $truck->contract_number = $data[1];} else {$truck->is_conctract = 0; $truck->contract_number = "";}
                if (strlen($data[7]) > 4) {$truck->is_act = 1; $truck->act_number = $data[7];} else {$truck->is_act = 0; $truck->act_number = "";}*/

                $truck->balance_license_fee = (int)$_POST["amount_fee_license"];
                $truck->daily_license_fee = $_POST["weight"];
                $truck->comment = $_POST["comment"];
                $truck->fio = $_POST["fio"];

                if (!$truck->save()) {
                    print_r($truck->getErrors());
                };

            }

            $payment  = new Payments();
            $payment->plate = MYChtml::check_num($_POST["plate"]);
            if ($_POST["amount_installation"] > 0) {$payment->amount_installation = (int)$_POST["amount_installation"];   }
            if ($_POST["amount_fee_license"] > 0) {$payment->amount_fee_license = (int)$_POST["amount_fee_license"];  }

            $payment->date = $_POST["date"];
            $payment->comment = $_POST["comment"];
            if (!$payment->save()) print_r($payment->getErrors());

        }

        $this->render('create');
    }

    public function actionList() {

        $result = RequestShipping::model()->findAll();
        $this->render("list",array("result"=>$result));

    }

	public  function  createRequest() {
        $request = New RequestShipping();
        $result = RequestShipping::add($_POST,$request);

        return $result;
    }






}