<?php

class OrangeController extends ControlerCPanel
{

    public $SessionID;
    public $ErrorCode;
    public $ClearingNumber;
    public $amount;
    public $plate;
    public $typeAction;
    public $salt = "456solod123";
    public $data;
    public static $installationPrice = 9000;
    public static $yearLicenseFeePrice = 2000;
    public static $monthLicenseFeePrice = 300;

    public function filters()
    {
          return array(
              'getData'
          );
    }


    public  function  filterGetData($filterChain){


       $this->SessionID =  $_POST['SessionID'];
       $this->ClearingNumber = $_POST['ClearingNumber'];
       $this->plate = $_POST['plate'];
       $this->data = Array();
        $filterChain->run();
        return true;
    }


    public function logging($mytext){
        $fp = fopen("log1.txt", "a+");
        $test = fwrite($fp, $mytext);
        fclose($fp);
    }



    static function hashcode($post, $salt){
        $str = sha1($post['SessionID'].$post["MachineMark"]."".$post['ClearingNumber']."".$salt, true);
        return base64_encode($str);
    }

    static function hashcode_answer($post, $status, $salt){
        $str = sha1($post['SessionID'].$status."".$post['ClearingNumber']."1000руб".$salt, true);
        return urlencode(base64_encode($str));
    }

    public function dataCreateMessage() {
        $str = "";
        foreach ($this->data as $data) {
            $str.=$data;
        }
        return $str;
    }

    public function dataAndKeyCreateMessage() {
        $str = "";
        foreach ($this->data as $key=>$data) {
            $str.="&".$key."=".$data;
        }
        return $str;
    }

    public function sendRequest() {

        $str = $this->SessionID.$this->ErrorCode.$this->ClearingNumber.$this->dataCreateMessage().$this->salt;
        $sha1 = urlencode(base64_encode(sha1($str,true)));
        $str = "SessionID=".$this->SessionID."&ErrorCode=".$this->ErrorCode."&ClearingNumber=".$this->ClearingNumber.$this->dataAndKeyCreateMessage()."&Hashcode=".$sha1."\r\n";
        $this->logging($str);
        echo $str;
    }

    function actionCheckBalance() {

        $truck = Trucks::checkPlate(MYChtml::check_num($this->plate));
        if ($truck) {
            $this->data["amount"] = $truck->balance_license_fee." руб.";
            $this->ErrorCode = "0";
        } else {
             $this->data["errortext"] = "Автомобиль с таким гос. номером не найден в списке автомобилей установленных в ООО Порт-транзит";
            $this->ErrorCode = "1";
        }
        $this->sendRequest();
    }

    function actionConfirmIncome() {

        $truck = Trucks::checkPlate(MYChtml::check_num($this->plate));
        if ($truck) {
          //$truck = new Trucks();
            $cash = (float)$_POST["cash"];
            if (Payments::addBalanceFee($cash,MYChtml::check_num($this->plate))) {
                $this->ErrorCode = "0";
                $this->data["amount"] = $truck->balance_license_fee + $cash;
                $this->data["goods"] = $this->plate;
            } else {
                $this->ErrorCode = "1";
            }
        }
        $this->sendRequest();
    }

    function actionCheckNewGlonass() {

        if (Trucks::checkPlate(MYChtml::check_num($this->plate))) {
            $this->ErrorCode = "1";
            $this->data["result"] = "Такой автомобиль уже существует";
        } else {
            $this->ErrorCode = "0";
            $this->data["result"] = "Автомобиль может быть добавлен в ГЛОНАСС";
        }
        $this->sendRequest();
    }

    function actionConfirmNewGlonass() {

        if (Trucks::checkPlate(MYChtml::check_num($this->plate))) {
            $this->ErrorCode = "1";
            $this->data["result"] = "Такой автомобиль уже существует";
        } else {
            $this->ErrorCode = "0";
            $this->data["result"] = "Предоплата за установку ГЛОНАСС авто ".MYChtml::check_num($this->plate);
            $truck = new Trucks();

            $truck->plate = MYChtml::check_num($_POST["plate"]);


            $cash = (float)$_POST["amount"];
            if ($cash >= self::$installationPrice) {$installFee =  self::$installationPrice; $balanceFee = $cash - self::$installationPrice; $installation_is_close = 1;} else {$balanceFee = 0; $installFee = $cash; $installation_is_close = 0;}
            if (self::$yearLicenseFeePrice <= $balanceFee ) $truck->daily_license_fee = self::$yearLicenseFeePrice / 365; else $truck->daily_license_fee = self::$monthLicenseFeePrice/30;

            $truck->installation_is_close = $installation_is_close;
            $truck->balance_license_fee = $balanceFee;
            $truck->comment = "Через аппарат session = ".$this->SessionID.", телефон ".$_POST['phone'];
            $truck->type = 0;
            if ($truck->save()) {

                Payments::addBalanceAndInstatllFee($balanceFee,$installFee,MYChtml::check_num($this->plate));

            }else $this->ErrorCode = "1";

        }
        $this->sendRequest();
    }


    function actionCheckDebtInstallation($plate) {


    }

    function actionAddFeeLicense($plate, $amount) {


    }

    function actionAddInstallation($plate, $amount) {


    }

    function actionAddTransition($plate, $amount) {


    }

    function actionAddPrepayment($plate,$amount) {


    }

    function actionAddDebt($plate,$amount) {



    }





}


