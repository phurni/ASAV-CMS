<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	public function authenticate(){
		$record=User::model()->findByAttributes(array('Username'=>$this->username));
		
		if($record===null){
			$this->_id='user Null';
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if($record->Password!==$this->password){
			$this->_id=$this->username;
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id=$record['Id'];
			$this->setState('title', $record['Username']);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId(){
		return $this->_id;
	}
}