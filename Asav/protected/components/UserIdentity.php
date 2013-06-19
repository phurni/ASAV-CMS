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
		
		
		$credentials;
		// Get the encrypted version of the given password
		if($record!==null){
			$credentials = $record->encrypt($this->password, $record->Salt);
		}
		
		if($record===null){
			$this->_id='user Null';
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if($record->Password!==$credentials["hash"]){
			$this->_id=$this->username;
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id=$record['Id'];
			
			$auth=Yii::app()->authManager;
			
			/*
			$role = $auth->createRole('sponsor');
			$role = $auth->createRole('staff');
			$role = $auth->createRole('admin');
			*/
			
			if(!$auth->isAssigned($record->group->Name,$this->_id)){
				if($auth->assign($record->group->Name,$this->_id)){
					Yii::app()->authManager->save();
				}
			}
			
			$this->setState('title', $record['Username']);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId(){
		return $this->_id;
	}
}