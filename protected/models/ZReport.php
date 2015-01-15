<?php

Yii::import('application.models._base.BaseZReport');

class ZReport extends BaseZReport
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}