<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class AccessoryFunctions extends  CHtml
{


    public static function clearTel($tel) {
        return ereg_replace("[ ()-]","",$tel);
    }

    public static function replaceText($text){
        $text=mb_strtoupper($text);
        $text=iconv("UTF-8","CP1251",$text);
        return $text;
    }

    public static function trimStr($str){

        $arr_str = explode(" ", $str);

        $arr = array_slice($arr_str, 0, 4);

        $new_str = implode(" ", $arr);

        if (count($arr_str) > 6) {
            $new_str .= '...';
        }
        return $new_str;
    }

    public static function showDate($date) {
        if($date=='0000-00-00'){
            return "ƒата не указанна";
        }
        $array=array('01'=>"€нвар€",
                     '02'=>"феврал€",
                     '03'=>"марта",
                     '04'=>"апрел€",
                     '05'=>"ма€",
                     '06'=>"июн€",
                     '07'=>"июл€",
                     '08'=>"августа",
                     '09'=>"сент€бр€",
                     '10'=>"окт€бр€",
                     '11'=>"но€бр€",
                     '12'=>"декабр€");

        $no_zero=array('01'=>"1",
                       '02'=>"2",
                       '03'=>"3",
                       '04'=>"4",
                       '05'=>"5",
                       '06'=>"6",
                       '07'=>"7",
                       '08'=>"8",
                       '09'=>"9");
        $new_date=explode("-",$date);
        if(strpos($date,":")>0){
            $time=explode(" ",$new_date[2]);
            return(in_array($time[0],$no_zero))?$no_zero[$time[0]]." ".$array[$new_date[1]]." ".$new_date[0]." (".$time[1].")":$time[0]." ".$array[$new_date[1]]." ".$new_date[0]." (".$time[1].")";
        }else{
            return(in_array($new_date[2],$no_zero))?$no_zero[$new_date[2]]." ".$array[$new_date[1]]." ".$new_date[0]:$new_date[2]." ".$array[$new_date[1]]." ".$new_date[0];
        }

    }

    public static function emailValidation($email) {
        $regexp="/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/";
        return !preg_match($regexp, $email)?false:true;
    }

    public static function save($val){
        switch ($val){
            case 'error': { $save = 'ќшибка сохранени€'; break; }
            case 'doubleId': { $save = '”стройство с таким ID уже существует'; break; }
            default: $save = '—охранено успешно';
        }
        return $save;
    }

}
