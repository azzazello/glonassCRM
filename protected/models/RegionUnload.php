<?php

Yii::import('application.models._base.BaseRegionUnload');

class RegionUnload extends BaseRegionUnload
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getAll() {

            $result = RegionUnload::model()->findAll();
            $array = array();
            foreach($result as $val) {
                $array[$val->id] = $val->name;
            }

        return $array;
    }
}