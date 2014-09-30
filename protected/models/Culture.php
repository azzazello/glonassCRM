<?php

Yii::import('application.models._base.BaseCulture');

class Culture extends BaseCulture
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}