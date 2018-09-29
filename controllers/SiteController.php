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
use app\models\tbl_Accounts;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    
    public function actionAddAdmin()
    {
    	$model=User::find()->where(['login'=>'admin'])->one();
    	if(empty($model)){
    		//Создадим пользователя администратора
    		$user = new User();
    		$user->login = 'admin';
    		$user->setPassword('admin');
    		$user->level='100';
    		$user->fam='Администратор';
    		$user->im='Администратор';
    		$user->ot='Администратор';
    		$user->generateAuthKey();
    		if($user->save()){
    			//return static::render('index');
    			//echo 'good';
    			return $this->render('addadmin');
    		}
    	}
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
    	    	
    	
//     	$pagination = new Pagination([
//     			'defaultPageSize'=>15,
//     			'totalCount'=>$query->count(),
//     	]); 
    	
//     	$users = $query->orderBy('login')
//     	->offset($pagination->offset)
//     	->limit($pagination->limit)
//     	->all();
    	
    	return $this->render('accounts',[
    				'users'=>$provider,
    				//'pagination'=>$pagination,
    			
    	]);
    }
}
