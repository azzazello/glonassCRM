<?php

Yii::import('application.models._base.BaseSocrbase');

class Socrbase extends BaseSocrbase
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}