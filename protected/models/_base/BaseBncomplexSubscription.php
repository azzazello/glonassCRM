<?php

/**
 * This is the model base class for the table "bncomplex_subscription".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BncomplexSubscription".
 *
 * Columns in table "bncomplex_subscription" available as properties of the model,
 * followed by relations of table "bncomplex_subscription" available as properties of the model.
 *
 * @property integer $id
 * @property integer $id_account
 * @property string $plate
 *
 * @property BncomplexAccount $idAccount
 */
abstract class BaseBncomplexSubscription extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'bncomplex_subscription';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'BncomplexSubscription|BncomplexSubscriptions', $n);
	}

	public static function representingColumn() {
		return 'plate';
	}

	public function rules() {
		return array(
			array('id_account, plate', 'required'),
			array('id_account', 'numerical', 'integerOnly'=>true),
			array('plate', 'length', 'max'=>255),
			array('id, id_account, plate', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idAccount' => array(self::BELONGS_TO, 'BncomplexAccount', 'id_account'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'id_account' => null,
			'plate' => Yii::t('app', 'Plate'),
			'idAccount' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_account', $this->id_account);
		$criteria->compare('plate', $this->plate, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}