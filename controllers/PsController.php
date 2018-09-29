<?php

namespace app\controllers;

use Yii;
use app\models\Ps;
use app\models\PsSearch;
use app\models\Buildings;
use app\models\BuildingsInfo;
use app\models\JTp;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;//Для ручной пагинации
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PsController implements the CRUD actions for Ps model.
 */
class PsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ps models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ps model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ps model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ps();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	//При создании подстанции создадим здание подстанции
        	$building = new Buildings();
        	$building->id_ps=$model->id;
        	$building->save();
        	//Перейдем к просмотру
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ps model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ps model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        //Удалим связанное здание
        $id_building=Buildings::findOne(['id_ps'=>$id])->id;
		Buildings::findOne(['id_ps'=>$id])->delete();
		BuildingsInfo::deleteAll(['id_building'=>$id_building]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Ps model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ps the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ps::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    /**
     * Вывод данных по зданиям выбранной подстанции
     * 
     */
    public function actionJ_build($id)
    {	
    	$model =  $this->findModel($id);
    	$buildings = Buildings::findOne(['id_ps'=>$model->id]);    
    	$buildings_info = BuildingsInfo::findAll(['id_building'=>$buildings->id]);
    	
    	
    	//$query = tbl_Accounts::find();
    	$query= BuildingsInfo::find()->where(['id_building'=>$buildings->id]);//All(['id_building'=>$buildings->id]);
    	//Переписываем под Grid View
    	$buildings_info= new ActiveDataProvider([
    			'query'=>$query,
    			'pagination'=>[
    					'pageSize'=>5,
    			],
    			'sort'=>[
    					'defaultOrder'=>[
    							'date_r'=>SORT_ASC,
    					]
    			]    			
    	]);
    	
    	
    	
    	return $this->render('view_buildings', [
    			'model' => $model,
    			'buildings'=>$buildings,
    			'buildings_info'=>$buildings_info,
    	]);
    }
    
    /**
     * Редактирование данных здания
     * @param integer $id
     * @param integer $build_id
     */
    public function actionJ_build_edit($id,$id_build)
    {
    	$model =  $this->findModel($id);
    	$buildings = Buildings::findOne($id_build);    	    
    	if ($buildings->load(Yii::$app->request->post()) && $buildings->save()) {
    		return $this->redirect(['j_build', 'id' => $model->id]);
    	}    	
    	return $this->render('_buildings', [
    			'model' => $model,
    			'buildings'=>$buildings,
    	]);    	
    }
    
    /**
     * Добавление ремонта здания
     * @param unknown $id
     * @param unknown $id_build
     */
    public function actionJ_build_remont_add($id,$id_build)
    {
    	$model =  $this->findModel($id);
    	$buildings = Buildings::findOne($id_build);
    	$remont = new BuildingsInfo;    	
    	if ($remont->load(Yii::$app->request->post())) {
    		$remont->id_building=$buildings->id;
    		$remont->fio_loging=Yii::$app->user->identity->fam . ' ' . mb_substr(Yii::$app->user->identity->im,0,1) . '. ' .mb_substr(Yii::$app->user->identity->ot,0,1) . '.';
    		//Форматируем дату
    		$date = \DateTime::createFromFormat('d-m-Y',$remont->date_r);    		
    		$remont->date_r=$date->format('Y-m-d');
    		
    		$remont->save();
    		return $this->redirect(['j_build', 'id' => $model->id]);
    	}
    	return $this->render('_buildings_remont', [
    			'model' => $model,
    			'buildings'=>$buildings,
    			'remont'=>$remont,
    	]);
    	
    }
    
	/**
	 * Вывод данных по экрану ТП
	 * @param unknown $id
	 * @return string
	 */    
    public function actionJ_tp($id)
    {
    	$model =  $this->findModel($id);    	    	

    	$query= JTp::find()->where(['id_ps'=>$model->id]);
    	$pagination = new Pagination([
    			'defaultPageSize'=>5,
    			'totalCount'=>$query->count(),
    	]);
    	
    	$jtp = $query->orderBy('date_pr')
    			->offset($pagination->offset)
    			->limit($pagination->limit)
    			->all();
    	
    	
    	return $this->render('view_jtp', [
    			'model' => $model,
    			'jtp'=>$jtp,
    			'pagination'=>$pagination,
    	]);
    }
    
    
}
