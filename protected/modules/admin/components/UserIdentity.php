<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
	public function authenticate()
	{
        Yii::app()->user->setState(isAdminUser,false);
        Yii::app()->user->setState(isManagerUser,false);

        $record=Users::model()->findByAttributes(array('username'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('Rights', $record->rights);

            if($record->rights >= 10){
                 Yii::app()->user->setState(isAdminUser,true);
            } else {
                 Yii::app()->user->setState(isManagerUser,true);
            }
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
    public function getId()
    {
        return $this->_id;
    }
}