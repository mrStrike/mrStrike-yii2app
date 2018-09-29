<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Характеристика зданий';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buildings_view">
    <h3><?= Html::encode($model->name) ?></h3>
    <div class="btn-group" role="group">
		<?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', ['index'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Изменить', ['j_build_edit', 'id' => $model->id,'id_build'=>$buildings->id,], ['class' => 'btn btn-primary']) ?>		    
		<?= Html::a('<span class="glyphicon glyphicon-wrench"></span> Добавить ремонт', ['j_build_remont_add', 'id' => $model->id,'id_build'=>$buildings->id,], ['class' => 'btn btn-success']) ?>		
    </div>
	<div class="row"><div class="col-md-12"></div></div>    
	<div class="row">
	    <div class="col-md-3">
    	<?php		echo $this->render('_menu',['model'=>$model]);   	?>
    	</div>
		<div class="col-md-9">
			<table class="table table-condensed" style="margin-top:20px;">
				<tbody>
					<tr>
						<td>
							<h4>Характеристики здания</h3>
							<?=DetailView::widget([
									'model' => $buildings,
									'template' => '<tr><td style="padding:0;"><b>{label}</b> : <u>{value}</u></td></tr>',
									'options' => [
											'class' => 'table table-striped table-condensed table-hover',
											'style'=>'margin-left:10px;'
									],
									'attributes' => [
											'name',
											'fundament',
											'stena',
											'perekritie',
											'krovli',
											'dor_iron',
											'dor_tree',
											'build_h',
											'other',
									]
							]);?>
							
						</td>
					</tr>
					<tr>
						<td>
							<h4>Сведения о ремонтах здания</h3>				
						    <?= GridView::widget([
						        'dataProvider' => $buildings_info,
						   		'tableOptions' => ['class' => 'table table-striped table-small-font table-bordered table-hover', 'style'=>'font-size:12px;',
						   						],
						    	'options'=>['class'=>'grid-view',
						    				],
						        'columns' => [
						        	[   'class'=>'yii\grid\DataColumn',
						        		//'contentOptions' => ['style' => 'width: 205px; word-wrap: break-word;', 'class' => 'text-center'],
						        		'headerOptions' => ['style'=>'width: 155px; white-space:normal;','class' => 'text-left'],
						        		'attribute'=>'date_r',
						       			'content'=>function($data){
						       					$date = \DateTime::createFromFormat('Y-m-d',$data->date_r);
						       					return $date->format('d-m-Y');
						       					
						    				}
						            ],
						            
						            [  	'class'=>'yii\grid\DataColumn',
						            	'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            	'attribute'=>'remont_info',            
						            ],
						                        
						        	[	'class'=>'yii\grid\DataColumn',
						        		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						        		'attribute'=>'remont_p',
						            ],
						
						        	[	'class'=>'yii\grid\DataColumn',
						        		'headerOptions' => ['style'=>'width: 200px; white-space:normal;','class' => 'text-left'],
						        		'attribute'=>'fio_curator',
						        		'content'=>function($data){
						        			$date = \DateTime::createFromFormat('Y-m-d H:m:s',$data->time_stamp);
						        			$date2 = $date->format('d-m-Y H:m:s');
						        		
						        			$text = '<b>Ответственный:</b><br>&nbsp;<u>' . $data->fio_curator 
						        				. '</u><br><small><b>Автор:</b><br>&nbsp;<u>' . $data->fio_loging 
						        				. '</u><br><b>Время:</b>'. $date2 .'</small>';
						        			return $text;
						        			
						            	}
						            
						        	],
						        								        		
						           // ['class' => 'yii\grid\ActionColumn'],
						        ],
						    ]); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>	
</div>
