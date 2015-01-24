<?php

/**
 * This is the model base class for the table "Login".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Login".
 *
 * Columns in table "Login" available as properties of the model,
 * followed by relations of table "Login" available as properties of the model.
 *
 * @property integer $LoginID
 * @property string $User
 * @property string $Pass
 * @property boolean $State
 * @property integer $Type
 * @property integer $AreaID
 * @property integer $Param
 * @property string $Comment
 * @property string $TechComment
 * @property string $AddTime
 * @property string $LastTime
 * @property integer $SendInt
 * @property string $Version
 * @property integer $AppType
 * @property string $AppVer
 * @property string $UpdTime
 * @property boolean $AreaAdmin
 * @property boolean $PersistCon
 * @property integer $LangID
 * @property string $Email
 * @property integer $MaxSessions
 *
 * @property AreaDescr $area
 * @property Languages $lang
 * @property UserTypes $type
 * @property EquipDescr[] $equipDescrs
 * @property Objects[] $objects
 * @property SyncGrp[] $syncGrps
 * @property Subscriptions[] $subscriptions
 */
abstract class BaseLogin extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'Login';
	}

    public function getDbConnection() {
        return Yii::app()->BNComplex;
    }

	public static function label($n = 1) {
		return Yii::t('app', 'Login|Logins', $n);
	}

	public static function representingColumn() {
		return 'User';
	}

	public function rules() {
		return array(
			array('User, AreaID', 'required'),
			array('Type, AreaID, Param, SendInt, AppType, LangID, MaxSessions', 'numerical', 'integerOnly'=>true),
			array('User, Comment, TechComment', 'length', 'max'=>64),
			array('Pass', 'length', 'max'=>32),
			array('Version, AppVer', 'length', 'max'=>20),
			array('Email', 'length', 'max'=>128),
			array('State, AddTime, LastTime, UpdTime, AreaAdmin, PersistCon', 'safe'),
			array('Pass, State, Type, Param, Comment, TechComment, AddTime, LastTime, SendInt, Version, AppType, AppVer, UpdTime, AreaAdmin, PersistCon, LangID, Email, MaxSessions', 'default', 'setOnEmpty' => true, 'value' => null),
			array('LoginID, User, Pass, State, Type, AreaID, Param, Comment, TechComment, AddTime, LastTime, SendInt, Version, AppType, AppVer, UpdTime, AreaAdmin, PersistCon, LangID, Email, MaxSessions', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'area' => array(self::BELONGS_TO, 'AreaDescr', 'AreaID'),
			'lang' => array(self::BELONGS_TO, 'Languages', 'LangID'),
			'type' => array(self::BELONGS_TO, 'UserTypes', 'Type'),
			'equipDescrs' => array(self::HAS_MANY, 'EquipDescr', 'SpyID'),
			'objects' => array(self::MANY_MANY, 'Objects', 'ObjectsNames(LoginID, ObjectID)'),
			'syncGrps' => array(self::HAS_MANY, 'SyncGrp', 'LoginID'),
			'subscriptions' => array(self::HAS_MANY, 'Subscriptions', 'LoginID'),
		);
	}

	public function pivotModels() {
		return array(
			'objects' => 'ObjectsNames',
		);
	}

	public function attributeLabels() {
		return array(
			'LoginID' => Yii::t('app', 'Login'),
			'User' => Yii::t('app', 'User'),
			'Pass' => Yii::t('app', 'Pass'),
			'State' => Yii::t('app', 'State'),
			'Type' => null,
			'AreaID' => null,
			'Param' => Yii::t('app', 'Param'),
			'Comment' => Yii::t('app', 'Comment'),
			'TechComment' => Yii::t('app', 'Tech Comment'),
			'AddTime' => Yii::t('app', 'Add Time'),
			'LastTime' => Yii::t('app', 'Last Time'),
			'SendInt' => Yii::t('app', 'Send Int'),
			'Version' => Yii::t('app', 'Version'),
			'AppType' => Yii::t('app', 'App Type'),
			'AppVer' => Yii::t('app', 'App Ver'),
			'UpdTime' => Yii::t('app', 'Upd Time'),
			'AreaAdmin' => Yii::t('app', 'Area Admin'),
			'PersistCon' => Yii::t('app', 'Persist Con'),
			'LangID' => null,
			'Email' => Yii::t('app', 'Email'),
			'MaxSessions' => Yii::t('app', 'Max Sessions'),
			'area' => null,
			'lang' => null,
			'type' => null,
			'equipDescrs' => null,
			'objects' => null,
			'syncGrps' => null,
			'subscriptions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('LoginID', $this->LoginID);
		$criteria->compare('User', $this->User, true);
		$criteria->compare('Pass', $this->Pass, true);
		$criteria->compare('State', $this->State);
		$criteria->compare('Type', $this->Type);
		$criteria->compare('AreaID', $this->AreaID);
		$criteria->compare('Param', $this->Param);
		$criteria->compare('Comment', $this->Comment, true);
		$criteria->compare('TechComment', $this->TechComment, true);
		$criteria->compare('AddTime', $this->AddTime, true);
		$criteria->compare('LastTime', $this->LastTime, true);
		$criteria->compare('SendInt', $this->SendInt);
		$criteria->compare('Version', $this->Version, true);
		$criteria->compare('AppType', $this->AppType);
		$criteria->compare('AppVer', $this->AppVer, true);
		$criteria->compare('UpdTime', $this->UpdTime, true);
		$criteria->compare('AreaAdmin', $this->AreaAdmin);
		$criteria->compare('PersistCon', $this->PersistCon);
		$criteria->compare('LangID', $this->LangID);
		$criteria->compare('Email', $this->Email, true);
		$criteria->compare('MaxSessions', $this->MaxSessions);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}