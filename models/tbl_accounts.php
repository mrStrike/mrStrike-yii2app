<?php
/**
 * Класс для работы с таблицей Accounts
 */
namespace app\models;
use yii\db\ActiveRecord;

class tbl_Accounts extends ActiveRecord
{
	public static function tableName(){
		return "Accounts";
	}
}