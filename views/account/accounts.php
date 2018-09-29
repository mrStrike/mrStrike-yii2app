<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\base\Widget;
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\grid\ActionColumn;
use yii\helpers\Url;


$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="btn-group">
    	<?=Html::a('Добавить пользователя',Url::to(['account/new']),['class'=>'btn btn-default']) ?>
    </div>
	<?=GridView::widget([
			'dataProvider'=>$users,
			'columns'=>[
				[
					'class'=>DataColumn::className(),
					'attribute'=>'id',
					'label'=>'ID'
				],
				[
					'class'=>DataColumn::className(),
					'attribute'=>'login',
					'label'=>'Пользователь',
					'contentOptions'=>function ($model,$key,$index,$column){
						return ['class'=>'name'];
					},
					'content'=>function($data){
					return Html::a(Html::encode($data->login), Url::to(['view', 'id' => $data->id]));//$data->login;
					}
				],
				[
					'class'=>DataColumn::className(),
					'attribute'=>'password',
					'label'=>'Пароль'
				],
				[
					'class'=>DataColumn::className(),
					'attribute'=>'fam',
					'label'=>'Фамилия'
				],
				[
					'class'=>DataColumn::className(),
					'attribute'=>'im',
					'label'=>'Имя'
				],
				[
					'class'=>DataColumn::className(),
					'attribute'=>'ot',
					'label'=>'Отчество'
				],
				[
					'class'=>ActionColumn::className(),
					//TODO:: тут надо добавить правильные реакции на Обзор/Редактировать/Удалить
					'template'=>'{view} {edit} {delete}',
					'buttons'=>[
						'view'=>function ($url,$model,$key){
								return Html::a('<span class="glyphicon glyphicon-eye-open">',$url,['class'=>'btn btn-default btn-xs']);
							},
						'edit'=>function ($url,$model,$key){
								return Html::a('<span class="glyphicon glyphicon-pencil">',$url,['class'=>'btn btn-default btn-xs']);
							},
						'delete'=>function ($url,$model,$key){
							return Html::a('<span class="glyphicon glyphicon-trash">',$url,['class'=>'btn btn-default btn-xs']);
							},
							
					],
				],
					
					
			],
	])?>
    <p>
    <?=Html::a('Создать Администратора',Url::to(['site/add-admin']))?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
