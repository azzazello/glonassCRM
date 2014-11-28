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
        $arg=str_replace ('А','A',$arg);
        $arg=str_replace ('В','B',$arg);
        $arg=str_replace ('Е','E',$arg);
        $arg=str_replace ('К','K',$arg);
        $arg=str_replace ('М','M',$arg);
        $arg=str_replace ('Н','H',$arg);
        $arg=str_replace ('О','O',$arg);
        $arg=str_replace ('Р','P',$arg);
        $arg=str_replace ('С','C',$arg);
        $arg=str_replace ('Т','T',$arg);
        $arg=str_replace ('У','Y',$arg);
        $arg=str_replace ('Х','X',$arg);

        $arg=str_replace ('а','A',$arg);
        $arg=str_replace ('в','B',$arg);
        $arg=str_replace ('е','E',$arg);
        $arg=str_replace ('к','K',$arg);
        $arg=str_replace ('м','M',$arg);
        $arg=str_replace ('н','H',$arg);
        $arg=str_replace ('о','O',$arg);
        $arg=str_replace ('р','P',$arg);
        $arg=str_replace ('с','C',$arg);
        $arg=str_replace ('т','T',$arg);
        $arg=str_replace ('у','Y',$arg);
        $arg=str_replace ('х','X',$arg);
	
	 	 return $arg;
	 }


    public static function filter ($val) {
        return  trim(str_replace(array("\t","\\t","\\n","\\r","\n","\r","\\", "/", ";", ":", "'", "\"","(",")"),"",$val));
    }

	 public static function view_num($arg){

	 $arg=str_replace ('A','а',$arg);
	 $arg=str_replace ('B','в',$arg);
	 $arg=str_replace ('E','е',$arg);
	 $arg=str_replace ('K','к',$arg);
	 $arg=str_replace ('M','м',$arg);
	 $arg=str_replace ('H','н',$arg);
	 $arg=str_replace ('O','о',$arg);
	 $arg=str_replace ('P','р',$arg);
	 $arg=str_replace ('C','с',$arg);
	 $arg=str_replace ('T','т',$arg);
	 $arg=str_replace ('Y','у',$arg);
	 $arg=str_replace ('X','х',$arg);
	 
	 return $arg;
	}


    public static function bootboxAlert($v){
        switch ($v){
            case 'recovery': return 'Ссылка восстановления пароля не верна, пройдите процедуру восстановления еще раз'; break;
            case 'registration': return 'Регистрация прошла успешно'; break;
            case 'ok': return 'Сохранено успешно'; break;
            case 'login': return 'Вы ввели не верный логин или пароль'; break;
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
