<?php

/**
 * This is the model base class for the table "users_trucks".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UsersTrucks".
 *
 * Columns in table "users_trucks" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $truck_id
 *
 */
abstract class BaseUsersTrucks extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'users_trucks';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UsersTrucks|UsersTrucks', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('id, user_id, truck_id', 'required'),
			array('id, user_id, truck_id', 'numerical', 'integerOnly'=>true),
			array('id, user_id, truck_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => Yii::t('app', 'User'),
			'truck_id' => Yii::t('app', 'Truck'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('truck_id', $this->truck_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}