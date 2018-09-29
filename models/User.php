<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface //\yii\base\BaseObject implements \yii\web\IdentityInterface
{

	public static function tableName()
	{
		return 'accounts';
	}

	//-------------------------------------------------------------
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    //-------------------------------------------------------------
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token'=>$token]);
    }

    //-------------------------------------------------------------
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    //-------------------------------------------------------------
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    
    //-------------------------------------------------------------
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    //-------------------------------------------------------------
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert)){
    		if($this->isNewRecord){
    			$this->auth_key = \Yii::$app->security->generateRandomString();
    			$this->token = \Yii::$app->security->generateRandomString();
    		}
    		return true;
    	}
    	return false;
    }
    
    //-------------------------------------------------------------
    public function validatePassword($password)
    {
    	//return static::findOne(['password'=>$password]);
    	return $password===$this->password;
    }
    
    //-------------------------------------------------------------
    public static function findByUsername($username)
    {
    	return static::findOne(['login'=>$username]);
    }
    
    //-------------------------------------------------------------
    public function setPassword($password)
    {
    	$this->password=$password;
    }
    
    public function generateAuthKey()
    {
    	$this->auth_key=Yii::$app->security->generateRandomString();
    }
}
