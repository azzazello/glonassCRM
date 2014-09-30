<?php

Yii::import('application.models._base.BaseLoadType');

class LoadType extends BaseLoadType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}