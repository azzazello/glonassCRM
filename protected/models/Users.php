<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $status
 * @property string $email
 * @property string $skype
 * @property string $phone
 * @property string $contact_fio
 * @property string $organization_name
 * @property string $rating
 *
 * The followings are the available model relations:
 * @property RequestShipping[] $requestShippings
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>50),
			array('email, skype', 'length', 'max'=>256),
			array('phone', 'length', 'max'=>15),
			array('rating', 'length', 'max'=>3),
			array('contact_fio, organization_name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, password, status, email, skype, phone, contact_fio, organization_name, rating', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'requestShippings' => array(self::HAS_MANY, 'RequestShipping', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'status' => 'Status',
			'email' => 'Email',
			'skype' => 'Skype',
			'phone' => 'Phone',
			'contact_fio' => 'Contact Fio',
			'organization_name' => 'Organization Name',
			'rating' => 'Rating',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('contact_fio',$this->contact_fio,true);
		$criteria->compare('organization_name',$this->organization_name,true);
		$criteria->compare('rating',$this->rating,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}