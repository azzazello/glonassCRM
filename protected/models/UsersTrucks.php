<?php

Yii::import('application.models._base.BaseUsersTrucks');

class UsersTrucks extends BaseUsersTrucks
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}