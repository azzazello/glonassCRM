<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class MYChtml extends  CHtml
{
	public static function check_num($arg){
	
	  	$arg=strtoupper($arg);
        $arg=str_replace (' ','',$arg);
        $arg=str_replace ('�','A',$arg);
        $arg=str_replace ('�','B',$arg);
        $arg=str_replace ('�','E',$arg);
        $arg=str_replace ('�','K',$arg);
        $arg=str_replace ('�','M',$arg);
        $arg=str_replace ('�','H',$arg);
        $arg=str_replace ('�','O',$arg);
        $arg=str_replace ('�','P',$arg);
        $arg=str_replace ('�','C',$arg);
        $arg=str_replace ('�','T',$arg);
        $arg=str_replace ('�','Y',$arg);
        $arg=str_replace ('�','X',$arg);

        $arg=str_replace ('�','A',$arg);
        $arg=str_replace ('�','B',$arg);
        $arg=str_replace ('�','E',$arg);
        $arg=str_replace ('�','K',$arg);
        $arg=str_replace ('�','M',$arg);
        $arg=str_replace ('�','H',$arg);
        $arg=str_replace ('�','O',$arg);
        $arg=str_replace ('�','P',$arg);
        $arg=str_replace ('�','C',$arg);
        $arg=str_replace ('�','T',$arg);
        $arg=str_replace ('�','Y',$arg);
        $arg=str_replace ('�','X',$arg);
	
	 	 return $arg;
	 }


    public static function filter ($val) {
        return  trim(str_replace(array("\t","\\t","\\n","\\r","\n","\r","\\", "/", ";", ":", "'", "\"","(",")"),"",$val));
    }

	 public static function view_num($arg){

	 $arg=str_replace ('A','�',$arg);
	 $arg=str_replace ('B','�',$arg);
	 $arg=str_replace ('E','�',$arg);
	 $arg=str_replace ('K','�',$arg);
	 $arg=str_replace ('M','�',$arg);
	 $arg=str_replace ('H','�',$arg);
	 $arg=str_replace ('O','�',$arg);
	 $arg=str_replace ('P','�',$arg);
	 $arg=str_replace ('C','�',$arg);
	 $arg=str_replace ('T','�',$arg);
	 $arg=str_replace ('Y','�',$arg);
	 $arg=str_replace ('X','�',$arg);
	 
	 return $arg;
	}


    public static function bootboxAlert($v){
        switch ($v){
            case 'recovery': return '������ �������������� ������ �� �����, �������� ��������� �������������� ��� ���'; break;
            case 'registration': return '����������� ������ �������'; break;
            case 'ok': return '��������� �������'; break;
            case 'login': return '�� ����� �� ������ ����� ��� ������'; break;
        }
    }

    public static function view_date($val){
        return AccessoryFunctions::showDate($val);
    }


        public static function showMessage($get){
        if(empty($get)) return false;
        $test = false;
        foreach($get as $k=>$v){
            if(in_array($k,array('error','save'))){
                $text = self::bootboxAlert($v);
                break;
            }
        }
        return $text?'<script type="text/javascript"> bootbox.alert("'.$text.'");</script>':false;
    }


    public  static function toUTF8($str){
        return iconv("windows-1251", "utf-8",$str);
    }

    public  static function fromUTF8($str){
        return iconv("utf-8", "windows-1251",$str);
    }

    public static function  toArrayAndToUtf8($model,$keys)
    {   $array = array();
        foreach($model as $key=>$val){
            foreach ($keys as $k=>$v)
            {
             $array_temp[$k] = self::toUTF8($val->$v);
                array_push($array,$array_temp);
            }
        }
        return $array;
    }

    public  static  function alert_msg($msg){

        return '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                '.$msg.'
            </div>';

    }
    public  static  function success_msg($msg){
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        '.$msg.'
        </div>';
    }
}
