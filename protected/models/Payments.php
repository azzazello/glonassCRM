<?php

Yii::import('application.models._base.BasePayments');

class Payments extends BasePayments
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function addBalanceFee($amountAddFee, $plate, $date = false) {

        $payment = new Payments();
        $payment->plate = $plate;
        $payment->amount_fee_license = $amountAddFee;
        $payment->amount_installation = 0;
        if ($date)  $payment->date = $date; else $payment->date = new CDbExpression('NOW()');
        if ($payment->save()) {

            $truck = Trucks::model()->find("plate=:plate",array(":plate"=>$plate));
            if ($truck) {
                $truck->balance_license_fee += $amountAddFee;
                $truck->save();
            }
            return true;
        } else {
            return false;
            }
    }


    public static function addBalanceAndInstatllFee($amountBalanceFee, $amountInstallFee, $plate, $date = false) {

        $payment = new Payments();
        $payment->plate = $plate;
        $payment->amount_fee_license = $amountBalanceFee;
        $payment->amount_installation = $amountInstallFee;
        if ($date)  $payment->date = $date; else $payment->date = new CDbExpression('NOW()');
        if ($payment->save()) {
         return true;
        } else {
            return false;
        }
    }

}