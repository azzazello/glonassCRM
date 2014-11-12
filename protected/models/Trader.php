<?php

Yii::import('application.models._base.BaseTrader');

class Trader extends BaseTrader
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getAll() {

        $result = Trader::model()->findAll(array("order"=>"firm"));
        $array = array();
        foreach($result as $val) {
            $array[$val->id] = $val->firm;
        }

        return $array;
    }
}