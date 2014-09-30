<?php

Yii::import('application.models._base.BaseKladr');

class Kladr extends BaseKladr
{
    public $code_region;
    public $code_district;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


    public  static function getRegions($is_array = false) {
        $kladr =  Kladr::model()->findAll(array(
            "condition" => "substr(`CODE`,3,11) = '00000000000'",
            "select"=> "substr(`CODE`,1,2) as code_region,NAME,SOCR",
            "order"=>"NAME"
        ));

        if ($is_array) {



            $array = array();
            $socr = self::getSocrBase();

            foreach ($kladr as $val) {
                $array[$val->code_region]=$val->NAME.", ".mb_strtolower($socr[$val->SOCR]);
            }
            return $array;
        } else {
            return $kladr;
        }
    }

    public static function getLocalityInRegion($code,$name) {
        return Kladr::model()->findAll(array(
            "condition" => "substr(`CODE`,1,3) = '".mysql_real_escape_string($code)."' and substr(`CODE`,6,8) != '00000000' and name like '%".mysql_real_escape_string($name)."%'",
            "select"=> "substr(`CODE`,3,3) as code_district, *"
        ));

    }

    public static function getDistrict($region, $code) {

        return Kladr::model()->find(array(
            "condition" => "substr(`CODE`,1,2) = '".$region."' and substr(`CODE`,3,3) = '".$code."' and substr(`CODE`,6,8) = '00000000' and substr(`CODE`,3,11) != '00000000000'",
        ));
    }

    public static function getSocrBase() {

        $socrbase = Socrbase::model()->findAll();
        $socrbase_array = array();
        foreach ($socrbase as $val) {

            $socrbase_array[$val->SCNAME] = $val->SOCRNAME;
        }
        return $socrbase_array;

    }
}










