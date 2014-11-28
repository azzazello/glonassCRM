<?php

/**
 * This is the model base class for the table "mobile_user_role".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MobileUserRole".
 *
 * Columns in table "mobile_user_role" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $user_id
 * @property string $role
 * @property string $occupation
 *
 */
abstract class BaseMobileUserRole extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'glonass.mobile_user_role';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'MobileUserRole|MobileUserRoles', $n);
	}

	public static function representingColumn() {
		return 'user_id';
	}

	public function rules() {
		return array(
			array('user_id', 'required'),
			array('user_id', 'length', 'max'=>10),
			array('role', 'length', 'max'=>1),
			array('occupation', 'length', 'max'=>2),
			array('role, occupation', 'default', 'setOnEmpty' => true, 'value' => null),
			array('user_id, role, occupation', 'safe', 'on'=>'search'),
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
			'user_id' => Yii::t('app', 'User'),
			'role' => Yii::t('app', 'Role'),
			'occupation' => Yii::t('app', 'Occupation'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id, true);
		$criteria->compare('role', $this->role, true);
		$criteria->compare('occupation', $this->occupation, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}