<?php

Yii::import('application.models._base.BaseTruck');

class Truck extends BaseTruck
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}