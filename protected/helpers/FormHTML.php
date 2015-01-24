<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 24.09.14
 * Time: 16:16
 * To change this template use File | Settings | File Templates.
 */
class FormHTML
{


   public static  function  select($data, $id, $name, $placeholder = false, $key = false) {
       if ($placeholder) $placeholders = 'data-placeholder="'.$placeholder.'"'; else $placeholders = "";
       $select = '<select  name="'.$name.'" id="'.$id.'" '.$placeholders.' class="width300 select2">';
       if ($placeholder)    $select .= '<option value="0" >'.$placeholder."</option>";
        foreach ($data as $k=>$val) {
            if ($k == $key) $selected = "selected"; else $selected = "";
            $select .= '<option value="'.$k.'" '.$selected.'>'.$val."</option>";
        }
       $select .= '</select>';
       return $select;
    }


    public static  function  select_simple($data, $id, $name, $placeholder = false, $key = false) {
        if ($placeholder) $placeholders = 'data-placeholder="'.$placeholder.'"'; else $placeholders = "";
        $select = '<select  name="'.$name.'" id="'.$id.'" '.$placeholders.' style="width:150px">';
        if ($placeholder)    $select .= '<option value="0" >'.$placeholder."</option>";
        foreach ($data as $k=>$val) {

            $select .= '<option value="'.$val->$key.'">'.$val->$key."</option>";
        }
        $select .= '</select>';
        return $select;
    }


    public static function inputSelect2($id, $name, $placeholder = false){
       echo '<input type="text" disabled="disabled"  id="'.$id.'" name="'.$name.'" style="width:600px" class="bigdrop form-control"/>';


    }
}
