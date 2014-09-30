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
       $select = '<select id="select-search-hide" name="'.$name.'" id="'.$id.'" '.$placeholders.' class="width300">';
       if ($placeholder)    $select .= '<option value="0" >'.$placeholder."</option>";
        foreach ($data as $k=>$val) {
            if ($k == $key) $selected = "selected"; else $selected = "";
            $select .= '<option value="'.$k.'" '.$selected.'>'.$val."</option>";
        }
       $select .= '</select>';
       return $select;
    }

}
