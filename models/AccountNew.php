<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\tbl_Accounts;

class AccountNew extends Model
{
//     public $name;
//     public $email;
//     public $subject;
//     public $body;
//     public $verifyCode;

		public $login;
		public $password;
		public $fam;
		public $im;
		public $ot;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
    	//$dublicat = tbl_Accounts::find()->where(['login'=>$this->login])->exists();
        return [
            // name, email, subject and body are required
            [['login', 'password'], 'required','message'=>'Это обязательное поле'],
        	['login','unique','targetClass'=>'\app\models\tbl_Accounts','message'=>'Уже есть такой пользователь'],
        	[['fam','im','ot'],'safe'],
        ];
    }

    public function ANew(){    
    	//$dublicat = tbl_Accounts::find()->where(['login'=>$this->login])->exists();
    	if ($this->validate()/*&&(!$dublicat)*/) {
    		//Создаем аккаунт, и говорим что все ок
    		$account = new tbl_Accounts();
    		$account->login =$this->login;
    		$account->password=$this->password;
    		$account->fam=$this->fam;
    		$account->im=$this->im;
    		$account->ot=$this->ot;
    		$account->level='0';
    		$account->status='0';
    		$account->save();
    		return true;
    	}
    	else return false;
    }
}
