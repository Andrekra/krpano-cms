<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property integer $UserId
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Email
 * @property string $Username
 * @property string $Password
 * @property integer $Rights
 * @property string $Account
 * @property string $PayTime
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
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
		return 'Users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('Rights', 'numerical', 'integerOnly'=>true),
            array('Firstname, Lastname, Email, Username', 'length', 'max'=>50),
            array('Password', 'length', 'max'=>32),
            array('Account', 'length', 'max'=>4),
            array('PayTime', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('UserId, Firstname, Lastname, Email, Username, Password, Rights, Account, PayTime', 'safe', 'on'=>'search'),
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
             'projects' => array(self::HAS_MANY, 'Projects', 'UserId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserId' => 'User',
			'Firstname' => 'Firstname',
			'Lastname' => 'Lastname',
			'Email' => 'Email',
			'Username' => 'Username',
			'Password' => 'Password',
			'Rights' => 'Rights',
			'Account' => 'Account',
			'PayTime' => 'Pay Time',
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

		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('Firstname',$this->Firstname,true);
		$criteria->compare('Lastname',$this->Lastname,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Rights',$this->Rights);
		$criteria->compare('Account',$this->Account,true);
		$criteria->compare('PayTime',$this->PayTime,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}