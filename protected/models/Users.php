<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $user_email
 * @property string $user_password
 * @property string $user_firstname
 * @property string $user_lastname
 */
class Users extends CActiveRecord
{
	public $rememberMe;
	public $isPasswordChange = 0;
	private $_identity;
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
			array('username, user_email, user_password, user_firstname, user_lastname', 'required', 'on'=>'register'),
			array('username, user_password', 'required', 'on'=>'login'),
			array('user_firstname, user_lastname, id, user_email', 'required', 'except'=>'login'),
			array('id', 'length', 'max'=>20),
			array('username, user_email, user_firstname, user_lastname', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, user_email, user_password, user_firstname, user_lastname', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'user_email' => 'User Email',
			'user_password' => 'User Password',
			'user_firstname' => 'User Firstname',
			'user_lastname' => 'User Lastname',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_firstname',$this->user_firstname,true);
		$criteria->compare('user_lastname',$this->user_lastname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() {
		if ($this->isPasswordChange == 1) {
			$TPassword = new TPassword();
			$this->user_password = $TPassword->hash($this->user_password);
			$this->isPasswordChange = 0;
		}

		return true;
	}

	public function login() {
		$TPassword = new TPassword();
		$this->setAttribute('user_password', $TPassword->hash($this->user_password));

		$this->rememberMe = '0';
		if(isset($_POST['Users']['rememberMe'])) {
			$this->rememberMe = $_POST['Users']['rememberMe'];
		}

		if($this->_identity === null) {
			$this->_identity = new UserIdentity($this->username, $this->user_password);
			$this->_identity->authenticate();
		}

		if($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration=$this->rememberMe ? 3600*24*30 : 0;
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		} else {
			return false;
		}
	}
}
