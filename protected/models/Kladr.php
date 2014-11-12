<?php

Yii::import('application.models._base.BaseKladr');

class Kladr extends BaseKladr
{
    public $code_region;
    public $code_district;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getRegionNameByCladrCode($code) {

        $kladr =  Kladr::model()->find(array(
            "condition" => "`CODE` = :code",
            "select"=> "substr(`CODE`,1,2) as code_region,NAME,SOCR",
            "order"=>"NAME",
            "params"=>array(":code"=>substr($code,0,2)."00000000000")
        ));

        return $kladr;
    }

    public static function getLocalityNameByCladrCode($code) {

        $kladr =  Kladr::model()->find(array(
            "condition" => "`CODE` = :code",
            "select"=> "substr(`CODE`,1,2) as code_region,NAME,SOCR",
            "order"=>"NAME",
            "params"=>array(":code"=>$code)
        ));
        return $kladr;
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

    public static function getLocalityInRegionArrayForSelect2($code,$name) {
        $result = self::getLocalityInRegion($code,$name);
        $socr = self::getSocrBase();

        $array = array();
        foreach($result as $key=>$val) {

               $district = self::getDistrict($code,substr($val->CODE,2,3));
                if ($district) {

                    $district = ", ".$district->NAME." ".$socr[$district->SOCR];
                }

                $array_temp["id"] = MYChtml::toUTF8($val->CODE);
                $array_temp["text"] = MYChtml::toUTF8( $val->NAME = $val->NAME.", ".mb_strtolower($socr[$val->SOCR]).$district);
                array_push($array,$array_temp);

        }

        return $array;



    }

    public static function getLocalityInRegion($code,$name) {

        if (strlen($name)>2) {
            return Kladr::model()->findAll(array(
                "condition" => "substr(`CODE`,1,2) = '".mysql_escape_string($code)."' and substr(`CODE`,6,8) != '000' and name like '%".MYChtml::fromUTF8($name)."%'",

           ));

        } else {
            return Kladr::model()->findAll(array(

                "condition" => "substr(`CODE`,1,2) = '".mysql_escape_string($code)."' and substr(`CODE`,6,8) != '000'",

            ));

        }



    }

    public static function getTextNameLocalityByKLADRcode($code) {

        $socr = self::getSocrBase();
        $region = self::getRegionNameByCladrCode($code);

        $locality = self::getLocalityNameByCladrCode($code);
        $district = self::getDistrict(substr($code,0,2),substr($code,2,3));


        $name = $locality->NAME." ".mb_strtolower($socr[$locality->SOCR]);
        if ($district) $name.= ", ".$district->NAME." ".mb_strtolower($socr[$district->SOCR]);
        $name.= ", ".$region->NAME." ".mb_strtolower($socr[$region->SOCR]);

        return $name;

    }

    public static function getDistrict($region, $code) {

        return Kladr::model()->find(array(
            "condition" => " substr(`CODE`,1,5) = '".$region.$code."' and substr(`CODE`,6,8) = '00000000' and substr(`CODE`,3,11) != '00000000000'",

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










