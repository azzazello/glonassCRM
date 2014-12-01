<?php

Yii::import('application.models._base.BaseRequestShipping');

class RequestShipping extends BaseRequestShipping
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}



    public static  function verify_income_data($array) {


            if (strtotime($array["date_load"]) and strtotime($array["date_load"]) >= (time()-3600*24)) {$result["data"]["date_load"] = $array["date_load"]; } else {$result["result"] = "error"; $result["errno"] = 1; return $result;}
            if (strtotime($array["date_end"]) and strtotime($array["date_end"]) >= (time()-3600*24)) {$result["data"]["date_close"] = $array["date_end"]; } else {$result["result"] = "error"; $result["errno"] = 2; return $result;}
            if ($array["regions"] != "0" and $array["regions"] != "") {$result["data"]["region_load_kladr_code"] = $array["regions"]; } else {$result["result"] = "error"; $result["errno"] = 3; return $result;}
            if ($array["locality"] != "0" and $array["locality"] != "") {$result["data"]["locality_load_kladr_code"] = $array["locality"]; $result["data"]["region_load_text"] = Kladr::getTextNameLocalityByKLADRcode($array["locality"]);} else {$result["return"] = "error"; $result["errno"] = 4; return $result;}
            if ($array["regionUnload"]!=0) {$result["data"]["region_unload_id"] = $array["regionUnload"]; } else {$result["result"] = "error"; $result["errno"] = 5; return $result;}
            if ((int)$array["distance"]!=0) {$result["data"]["distance"] = $array["distance"]; } else {$result["result"] = "error"; $result["errno"] = 6; return $result;}
            if ((int)$array["culture"]!=0) {$result["data"]["culure_id"] = $array["culture"]; } else {$result["result"] = "error"; $result["errno"] = 7; return $result;}
            if ((int)$array["trader"]>0) {$result["data"]["trader_id"] = $array["trader"]; } else {$result["result"] = "error"; $result["errno"] = 8; return $result;}
            if ((float)$array["price"]>0) {$result["data"]["price"] = $array["price"]; } else {$result["result"] = "error"; $result["errno"] = 9; return $result;}
            if ((int)$array["scale"]>0) {$result["data"]["scale"] = $array["scale"]; } else {$result["result"] = "error"; $result["errno"] = 10; return $result;}
            if ((int)$array["load_type"]>0) {$result["data"]["load_type_id"] = $array["load_type"]; } else {$result["result"] = "error"; $result["errno"] = 11; return $result;}
            if ((int)$array["weight"]>0) {$result["data"]["weight"] = $array["weight"]; } else {$result["result"] = "error"; $result["errno"] = 12; return $result;}
            if (strlen($array["where_calculation"])>0  ) {$result["data"]["where_calculation"] = substr($array["where_calculation"],0,255); } else {$result["result"] = "error"; $result["errno"] = 13; return $result;}
            if ((int)$array["stevedore"]>0) {$result["data"]["stevedore_id"] = $array["stevedore"]; } else {$result["result"] = "error"; $result["errno"] = 14; return $result;}
            $result["data"]["description"] = $array["description"];
            $result["data"]["date_create"] = new CDbExpression("NOW()");
            //if ($array["is_overload"] == 1 ) $result["data"]["is_overload"] = 1; else $result["data"]["is_overload"] = 0;
            $result["result"] = "noerror";


            return $result;

    }

    public static  function createRequest($array_data){

        $request = new RequestShipping();
        return self::edit($array_data,$request);


    }

    public function close() {
        $this->status = 3;
        return $this->save();
    }

    public  function restore() {
        $this->status = 1;
        return $this->save();
    }


    public static function getAlLNonConfirmReply($id) {
        return ReplyShipping::model()->findAll("request_id = :id and confirm = 0", array(":id"=>$id));
    }

    public static function getAlLConfirmReply($id) {
        return ReplyShipping::model()->findAll("request_id = :id and confirm = 1", array(":id"=>$id));
    }


    public static function add($array_data, $object) {
        $verify_data = self::verify_income_data($array_data);
        if ($verify_data["result"] == "error") return $verify_data;

        $object->attributes = $verify_data["data"];
        $object->date_create = new CDbExpression("NOW()");
        $object->user_id = Users::getCurrUser();

        if ( $object->save()) {
            $result["result"] = "noerror";
            $result["object"] = $object;

        } else {
            $result["result"] = "error";
            $result["errno"] = -1;
            $result["error"] = $object->getErrors();
        }
        return $result;

    }

    public static function countRequestAmountMoney(){
        $result = RequestShipping::model()->findAll();
        $sum = 0;
        foreach ($result as $value) {
            //$value = new RequestShipping();
            $sum += (($value->weight*1000))*$value->price;
        }
        return MYChtml::numberFormat($sum);
    }

    public static function countRequestAmountMoneyYesterday(){
        $result = RequestShipping::model()->findAll("DATE(date_create) = DATE(now())");
        $sum = 0;
        foreach ($result as $value) {
            //$value = new RequestShipping();
            $sum += (($value->weight*1000))*$value->price;
        }
        return MYChtml::numberFormat($sum);
    }

    public static function countRequestAmountMoneyWeekly(){
        $result = RequestShipping::model()->findAll("DATE(date_create) >= DATE(CURDATE()-WEEKDAY(CURDATE()))");
        $sum = 0;
        foreach ($result as $value) {
            //$value = new RequestShipping();
            $sum += (($value->weight*1000))*$value->price;
        }
        return MYChtml::numberFormat($sum);
    }


}