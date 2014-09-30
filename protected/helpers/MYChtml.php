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
	 
	 //return mb_strtoupper($arg);
	}

	public static function showMessage($content) {
        if (strlen($content)>0) return '<script type="text/javascript"> bootbox.alert("'.$content.'");</script>';
    }

    public static function view_active($val){
        return ($val == 0)?'Активен':'Заблокированн';
    }

    public static function getForvardName($val){
        $model = AccredForwarder::model()->findByPk($val);
        return $model->name;
    }

    public static function getplateTruck($val){
        $model = AccredAtp::model()->findByPk($val);
        return self::view_num($model->plate);
    }

    public static function getplateTrailer($val){
        $model = AccredTrailer::model()->findByPk($val);
        return self::view_num($model->plate);
    }

    //getDraverName

    public static function getDraverName($val){
        $model = AccredDriver::model()->findByPk($val);
        return $model->fio;
    }
    public static function getDraverTel($val){
        $model = AccredDriver::model()->findByPk($val);
        return $model->tel1;
    }

    public static function view_active_sms($val){
        return ($val == 0)?'Вход с SMS':'Вход без SMS';
    }

    public static function view_role($val){
        return Roles::model()->findByPk($val)->getAttribute('description');
    }


    public static function editPass($tel){
        $tel = substr($tel,0, strlen($tel)-4).'****';
        return $tel;
    }

    public static function view_date($val){
        return AccessoryFunctions::showDate($val);
    }

    public static function view_load_type($val){
        $model = LoadType::model()->findByPk($val);
        return $model->name;
    }

    public static function view_type($val){
         $model = TypeOwnership::model()->findByPk($val);
        return $model->value;
    }
    public static function view_good($val){
        $model = Goods::model()->findByPk($val);
        return $model->name;
    }
    public static function view_operation($val){
        $model = Operation::model()->findByPk($val);
        return $model->name;
       // return Operation::model()->findByPk($val)->getAttribute('name');
    }

    public static function view_yes_no($val){
        return ($val==0)?'Нет':'Да';
    }

    public static function view_terminel($val){
         $model = Terminals::model()->findByPk($val);
         return $model->name;
    }

    public static function view_id($id){
        return '<input type="checkbox"  value="'.$id.'" name="selectItem[]">';
    }

    public static function view_id_hidden($id){
        return '<input type="hidden"  value="'.$id.'" name="" class="hiddenId">';
    }

    public static function view_mark($id){
       return MarkLib::model()->findByPk($id)->getAttribute('name');
    }

    public static function view_timeslot($id){
        $model = Timeslots::model()->resetScope()->findByPk($id);
        $start = explode(":",$model->start);
        $end = explode(":",$model->end);
        return $start[0].":".$start[1]." - ".$end[0].":".$end[1];
    }

    public static function view_inn($id){
         $model = AccredForwarder::model()->findByPk($id);
         return $model->inn;
    }

    public static function view_info_name($id){
         $model = AccredForwarder::model()->findByPk($id);
         return $model->name;
    }

    public static function getAlarmGoods($id){
        $model = AlarmTimeslotsOptions::model()->findAll('`alarm_id`='.(int)$id);
        $a= array();
        foreach($model as $item){
            if($item->Goods->delete == 1) {  continue;}
            if(!in_array($item->Goods->name,$a)) array_push($a,$item->Goods->name);
        }
        return self::getArrayOptions($a);
    }

    private static function getArrayOptions($a){
        $str = '';
        $i = 0;
        foreach($a as $item){
            $str.=$item;
            $i++;
            if($i!=count($a)) $str.=", ";
        }
        return $str;
    }

    public static function getStatusName($val){
        switch ($val){
            case 1: return 'Ограничений нет'; break;
            case 2: return 'Запрет на регистрацию'; break;
            case 3: return 'Полный запрет'; break;
        }
    }

    public static function getOperationGoods($id){
        $model = AlarmTimeslotsOptions::model()->findAll('`alarm_id`='.(int)$id);


        $a= array();
        foreach($model as $item){
            if(!in_array($item->Operation->name,$a)) array_push($a,$item->Operation->name);
        }

        return self::getArrayOptions($a);
    }

    public function getRolesGoods($id){
        $model = Goodsforoperator::model()->findAll('`typeUserId`='.(int)$id);
        $str = '';
        $i = 0;
        foreach($model as $item){
            if($item->goods->delete == 1) {  $i++; continue;}
            $str.=$item->goods->name;
            $i++;
            if($i!=count($model)) $str.=", ";
        }
        return $str;
    }

    public static function Buttons($id){
//        <a href="#" id="blo'.$id.'" style="margin-left:10px; " class="block"><img width="24" src='.Yii::app()->request->baseUrl.'/img/arroy.png></a>
        return
        '<a href="#" id="del'.$id.'" title="Удалить" style="margin-left:25px;" class="delete"><img width="20" src='.Yii::app()->request->baseUrl.'/img/remove.png></a>';
    }

    public static function editAndDeleteButtons($id){
        return
        '<a href="#" id="del'.$id.'" title="Удалить" style="margin-left:10px; float:right;"  title="Удалить" class="delete"><img width="20" src='.Yii::app()->request->baseUrl.'/img/remove.png></a>
        <a href="#" id="blo'.$id.'" style="margin-left:10px;" title="Редактировать" class="block"><img width="21" src='.Yii::app()->request->baseUrl.'/img/edit.png></a>';
    }

    public static function editButtons($id){
        return '<a href="#" id="blo'.$id.'" style="margin-left:40px;" title="Редактировать" class="block"><img width="21" src='.Yii::app()->request->baseUrl.'/img/edit.png></a>';
    }
    public static function deleteButton($id){
        return '<a href="#" id="del'.$id.'" title="Удалить" style="margin-left:25px;"  title="Удалить" class="delete"><img width="20" src='.Yii::app()->request->baseUrl.'/img/remove.png></a>';
    }
    public static function passport($id){
        return '<a href="#" style="margin-left:15px;" title="" class="view"><img width="25" src='.Yii::app()->request->baseUrl.'/img/passpotr.png></a>';
    }
}
