<?php

Yii::import('application.models._base.BaseRequestShipping');

class RequestShipping extends BaseRequestShipping
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}



    public static  function verify_income_data($array) {


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

    public static function edit($array_data, $object) {
        $verify_data = self::verify_income_data($array_data);
        if ($verify_data["result"] == "error") return $verify_data["errno"];
        $object->attributes = $verify_data["data"];
        return $object->save();

    }


}