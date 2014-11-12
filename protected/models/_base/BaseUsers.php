<?php

/**
 * This is the model base class for the table "users".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Users".
 *
 * Columns in table "users" available as properties of the model,
 * followed by relations of table "users" available as properties of the model.
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $last_in
 * @property string $name
 * @property integer $admin
 * @property integer $activ
 * @property string $generate
 * @property integer $isProvider
 * @property integer $role
 * @property integer $confirm
 * @property string $mobile_token
 * @property string $mobile_version
 * @property string $mobile_platform
 * @property string $company
 * @property string $email
 * @property string $skype
 *
 * @property OperationWithRequests[] $operationWithRequests
 * @property ReplyShipping[] $replyShippings
 */
abstract class BaseUsers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'users';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Users|Users', $n);
	}

	public static function representingColumn() {
		return 'login';
	}

	public function rules() {
		return array(
			array('admin, activ, isProvider, role, confirm', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>50),
			array('password, name, generate, company, email, skype', 'length', 'max'=>255),
			array('mobile_token', 'length', 'max'=>30),
			array('mobile_version', 'length', 'max'=>10),
			array('mobile_platform', 'length', 'max'=>1),
			array('last_in', 'safe'),
			array('login, password, last_in, name, admin, activ, generate, isProvider, role, confirm, mobile_token, mobile_version, mobile_platform, company, email, skype', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, login, password, last_in, name, admin, activ, generate, isProvider, role, confirm, mobile_token, mobile_version, mobile_platform, company, email, skype', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'operationWithRequests' => array(self::HAS_MANY, 'OperationWithRequests', 'userId'),
			'replyShippings' => array(self::HAS_MANY, 'ReplyShipping', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'login' => Yii::t('app', 'Login'),
			'password' => Yii::t('app', 'Password'),
			'last_in' => Yii::t('app', 'Last In'),
			'name' => Yii::t('app', 'Name'),
			'admin' => Yii::t('app', 'Admin'),
			'activ' => Yii::t('app', 'Activ'),
			'generate' => Yii::t('app', 'Generate'),
			'isProvider' => Yii::t('app', 'Is Provider'),
			'role' => Yii::t('app', 'Role'),
			'confirm' => Yii::t('app', 'Confirm'),
			'mobile_token' => Yii::t('app', 'Mobile Token'),
			'mobile_version' => Yii::t('app', 'Mobile Version'),
			'mobile_platform' => Yii::t('app', 'Mobile Platform'),
			'company' => Yii::t('app', 'Company'),
			'email' => Yii::t('app', 'Email'),
			'skype' => Yii::t('app', 'Skype'),
			'operationWithRequests' => null,
			'replyShippings' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('login', $this->login, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('last_in', $this->last_in, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('admin', $this->admin);
		$criteria->compare('activ', $this->activ);
		$criteria->compare('generate', $this->generate, true);
		$criteria->compare('isProvider', $this->isProvider);
		$criteria->compare('role', $this->role);
		$criteria->compare('confirm', $this->confirm);
		$criteria->compare('mobile_token', $this->mobile_token, true);
		$criteria->compare('mobile_version', $this->mobile_version, true);
		$criteria->compare('mobile_platform', $this->mobile_platform, true);
		$criteria->compare('company', $this->company, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('skype', $this->skype, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}