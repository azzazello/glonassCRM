<?php

Yii::import('application.models._base.BaseTrucks');

class Trucks extends BaseTrucks
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function checkPlate($plate) {

        $plate =  MYChtml::check_num($plate);
        return Trucks::model()->find("plate=:plate",array(":plate"=>$plate));
    }

    public function amountInstallation(){
        $amount = 0;
        foreach ($this->payments as $payment) {
            $amount+=$payment->amount_installation;
        }
        return $amount;
    }

    public function amountFeeLicense(){
        $amount = 0;
        foreach ($this->payments as $payment) {
            $amount+=$payment->amount_fee_license;
        }
        return $amount;

    }
}