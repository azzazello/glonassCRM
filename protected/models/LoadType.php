<?php

Yii::import('application.models._base.BaseLoadType');

class LoadType extends BaseLoadType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getAll() {

        $result = LoadType::model()->findAll();
        $array = array();
        foreach($result as $val) {
            $array[$val->id] = $val->name;
        }

        return $array;
    }
}