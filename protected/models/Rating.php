<?php

Yii::import('application.models._base.BaseRating');

class Rating extends BaseRating
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}