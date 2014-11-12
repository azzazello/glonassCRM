<?php

Yii::import('application.models._base.BaseCulture');

class Culture extends BaseCulture
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getAll() {

        $result = Culture::model()->findAll(array("order"=>"culture"));
        $array = array();
        foreach($result as $val) {
            $array[$val->id] = $val->culture;
        }

        return $array;
    }
}