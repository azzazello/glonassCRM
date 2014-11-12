<?php

Yii::import('application.models._base.BaseStevedore');

class Stevedore extends BaseStevedore
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getAll($id=false,$isUtf8 = false){

        if ($id) {
            $result = Stevedore::model()->findAll("regionUnloadId=:id",array(":id"=>$id));
        } else {
            $result = Stevedore::model()->findAll();
        }
        $array = array();
        foreach($result as $val) {

            if ($isUtf8)

            {array_push($array,array("id"=>$val->id,"name"=>MYChtml::toUTF8($val->name)));} else

            {   $array[$val->id] = $val->name;}

        }

        return $array;
    }
}