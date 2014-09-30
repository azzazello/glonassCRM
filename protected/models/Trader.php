<?php

Yii::import('application.models._base.BaseTrader');

class Trader extends BaseTrader
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}