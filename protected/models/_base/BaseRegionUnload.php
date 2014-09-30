<?php

/**
 * This is the model base class for the table "region_unload".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RegionUnload".
 *
 * Columns in table "region_unload" available as properties of the model,
 * followed by relations of table "region_unload" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 *
 * @property RequestShipping[] $requestShippings
 */
abstract class BaseRegionUnload extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'region_unload';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'RegionUnload|RegionUnloads', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'requestShippings' => array(self::HAS_MANY, 'RequestShipping', 'region_unload_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'requestShippings' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}