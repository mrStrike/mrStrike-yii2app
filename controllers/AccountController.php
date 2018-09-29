<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\AccountNew;
use app\models\tbl_Accounts;

class AccountController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    
    public function actionNew()
    {
    	$model = new AccountNew();
    	if($model->load(Yii::$app->request->post())&& $model->ANew()){
    		//return $this->goBack();
    		return Yii::$app->response->redirect(['account/accounts']);
    	}
    	return $this->render('new.php',['model'=>$model]);
    }
           
    
    public function actionDelete($id)
    {
    	//$this->findModel($id)->delete();
    	//tbl_Accounts::find($id)->delete();
    	$query = tbl_Accounts::findOne($id)->delete();
    	return $this->redirect(['accounts']);
    }
    public function actionAccounts(){
    	$query = tbl_Accounts::find();
    	//Переписываем под Grid View
    	$provider = new ActiveDataProvider([
    			'query'=>$query,
    			'pagination'=>[
    					'pageSize'=>12,
    			],
    			'sort'=>[
    					'defaultOrder'=>[
    							'login'=>SORT_ASC,
    					]
    			]
    			
    	]);
    	    	  	
    	return $this->render('accounts',[
    				'users'=>$provider,
    				//'pagination'=>$pagination,
    			
    	]);
    }
}
