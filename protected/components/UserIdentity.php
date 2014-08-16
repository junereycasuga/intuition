<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;

	public function authenticate()
	{
		$userRecord = Users::model()->findByAttributes(array('username'=>$this->username));

		if($userRecord===null) {
			return $this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if($userRecord->user_password != $this->password) {
			return $this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		
		// set session
		$this->_id = $userRecord->id;
		$this->setState('userId', $userRecord->id);
		$this->setState('userEmail', $userRecord->user_email);
		$this->setState('userName', $userRecord->username);
		$this->setState('userFirstname', $userRecord->user_firstname);
		$this->setState('userLastname', $userRecord->user_lastname);
		
		return $this->errorCode=self::ERROR_NONE;
	}

	public function getId() {
		return $this->_id;
	}
}