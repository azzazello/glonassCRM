<?php

Yii::import('application.models._base.BaseStevedore');

class Stevedore extends BaseStevedore
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}