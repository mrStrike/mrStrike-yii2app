<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подстанции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Создать новую подстанцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
   		'tableOptions' => [
    				'class' => 'table table-striped table-bordered table-hover'
						],
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

//             [
//             	'class'=>'yii\grid\DataColumn',
//             	'attribute'=>'id',
//             	'contentOptions'=>['style'=>'max-width: 75px; width:75px;'],
// 		    ],
        	
        	[
        		'class'=>'yii\grid\DataColumn',
        		'attribute'=>'inn',
        		'contentOptions'=>function ($model,$key,$index,$column){
        		return ['class'=>'inn','style'=>'max-width: 100px; width:100px;'];
            },
            	'content'=>function($data){
            		return Html::a(Html::encode($data->inn), Url::to(['view', 'id' => $data->id]));//$data->login;
            }
            ],
            
            
        	[
        		'class'=>'yii\grid\DataColumn',
        		'attribute'=>'name',
        		'contentOptions'=>function ($model,$key,$index,$column){
        			return ['class'=>'name'];
        	    },
            	'content'=>function($data){
	            	return Html::a(Html::encode($data->name), Url::to(['view', 'id' => $data->id]));//$data->login;
    	        }
            ],
        	//'name',
            //'year_build',
            //'year_expl',
            //'section_count',
            //'trans_count',
            //'pris_count',            
            //'pos_build',
            //'build_org',
            //'project_org',
            //'inn',
            //'power_point',
            //'dop_data:ntext',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
