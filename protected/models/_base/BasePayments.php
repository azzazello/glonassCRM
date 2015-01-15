<?php

/**
 * This is the model base class for the table "payments".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Payments".
 *
 * Columns in table "payments" available as properties of the model,
 * followed by relations of table "payments" available as properties of the model.
 *
 * @property integer $id
 * @property string $plate
 * @property integer $amount_installation
 * @property integer $amount_fee_license
 * @property string $date
 * @property string $comment
 *
 * @property Trucks $plate0
 */
abstract class BasePayments extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'payments';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Payments|Payments', $n);
	}

	public static function representingColumn() {
		return 'date';
	}

	public function rules() {
		return array(
			array('plate, date', 'required'),
			array('amount_installation, amount_fee_license', 'numerical', 'integerOnly'=>true),
			array('plate', 'length', 'max'=>25),
			array('comment', 'safe'),
			array('amount_installation, amount_fee_license, comment', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, plate, amount_installation, amount_fee_license, date, comment', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'plate0' => array(self::BELONGS_TO, 'Trucks', 'plate'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'plate' => null,
			'amount_installation' => Yii::t('app', 'Amount Installation'),
			'amount_fee_license' => Yii::t('app', 'Amount Fee License'),
			'date' => Yii::t('app', 'Date'),
			'comment' => Yii::t('app', 'Comment'),
			'plate0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('plate', $this->plate);
		$criteria->compare('amount_installation', $this->amount_installation);
		$criteria->compare('amount_fee_license', $this->amount_fee_license);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('comment', $this->comment, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}