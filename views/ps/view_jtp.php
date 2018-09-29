<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Экран ТП';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
Pjax::begin();
?>
<div class="buildings_view">
    <h3><?= Html::encode($model->name) ?></h3>
    <div class="btn-group" role="group">
		<?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', ['index'], ['class' => 'btn btn-success']) ?>				   
		<?= Html::a('<span class="glyphicon glyphicon-wrench"></span> Добавить ремонт', ['j_tp_remont_add', 'id' => $model->id,], ['class' => 'btn btn-success']) ?>		
    </div>
	<div class="row"><div class="col-md-12"></div></div>    
	<div class="row">
		<div class="col-md-12">
		<h4>Экран ТП</h3>
		<table class="stable table table-striped table-small-font table-bordered" style="white-space:normal; font-size:11px; text-align: center; padding:0px;">
			<thead>
				<tr>
					<th rowspan="3" style="width:75px;">Дата проведения ремонта</th>
					<th colspan="3">Дата проведения ремонта</th>
					<th colspan="5">Причина ремонта</th>
					<th colspan="3">РУ-0,4 кВ</th>
					<th colspan="3">Автом. выключ.</th>
					<th rowspan="3">Проверка сопротивления изоляции освещения</th>
					<th rowspan="3">Хим. анализ тр-ого масла</th>					
				</tr>
				<tr>					
					<th rowspan="2">Текущий ремонт</th>
					<th rowspan="2">Капитальный ремонт</th>
					<th rowspan="2">в/в испытания</th>
					
					<th colspan="2">Текущий ремонт</th>
					<th colspan="2">Капитальный ремонт</th>
					<th rowspan="2">в/в испытания</th>

					<th rowspan="2">Текущий ремонт</th>
					<th rowspan="2">Капитальный ремонт</th>
					<th rowspan="2">в/в испытания</th>

					<th rowspan="2">Текущий ремонт</th>
					<th rowspan="2">Капитальный ремонт</th>
					<th rowspan="2">в/в испытания</th>
					
				</tr>
				<tr>
					<th>Т-1</th>
					<th>Т-2</th>
					<th>Т-1</th>
					<th>Т-2</th>					
				</tr>
			</thead>
			<tbody>			
				<?php foreach ($jtp as $tp):?>
				<tr>
					<td><?= Html::encode(DateTime::createFromFormat('Y-m-d',$tp->date_pr)->format('d-m-Y')) ?></td>
					<td><?= Html::encode(DateTime::createFromFormat('Y-m-d',$tp->date_tr)->format('d-m-Y')) ?></td>
					<td><?= Html::encode(DateTime::createFromFormat('Y-m-d',$tp->date_kr)->format('d-m-Y')) ?></td>
					<td><?= Html::encode(DateTime::createFromFormat('Y-m-d',$tp->date_ivv)->format('d-m-Y')) ?></td>
					<td><?= Html::encode($tp->tr_t1) ?></td>
					<td><?= Html::encode($tp->tr_t2) ?></td>
					<td><?= Html::encode($tp->kr_t1) ?></td>
					<td><?= Html::encode($tp->kr_t2) ?></td>
					<td><?= Html::encode($tp->ivv) ?></td>
					<td><?= Html::encode($tp->ru04_tr) ?></td>
					<td><?= Html::encode($tp->ru04_kr) ?></td>
					<td><?= Html::encode($tp->ru04_ivv) ?></td>
					<td><?= Html::encode($tp->av_tr) ?></td>
					<td><?= Html::encode($tp->av_kr) ?></td>
					<td><?= Html::encode($tp->av_ivv) ?></td>
					<td><?= Html::encode($tp->p_iz) ?></td>
					<td><?= Html::encode($tp->ha_tm) ?></td>
				</tr>
				<?php endforeach;?>
			</tbody>

		</table>
		<?=LinkPager::widget(['pagination'=>$pagination,'options'=>['style'=>'padding:0px; margin:0px;', 'class' => 'pagination']]) ?>
				
	    <?php
						    	/*echo GridView::widget([
						        'dataProvider' => $jtp,
						   		'tableOptions' => ['class' => 'table table-striped table-small-font table-bordered table-hover', 'style'=>'font-size:11px;',
						   						],
						    	'options'=>['class'=>'grid-view',],
						        'columns' => [
						        	[   'class'=>'yii\grid\DataColumn',
						        		'headerOptions' => ['style'=>'width: 100px; border:1px solid red;white-space:normal;','class' => 'text-left'],
						        		'attribute'=>'date_pr',
						       			'content'=>function($data){
						       					$date = \DateTime::createFromFormat('Y-m-d',$data->date_pr);
						       					return $date->format('d-m-Y');
						       					
						    				}
						            ],
						            [   'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 155px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'date_tr',
						            		'content'=>function($data){
						            		$date = \DateTime::createFromFormat('Y-m-d',$data->date_tr);
						            		return $date->format('d-m-Y');
						            		
						            }
						            ],
						            [   'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 155px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'date_kr',
						            		'content'=>function($data){
						            		$date = \DateTime::createFromFormat('Y-m-d',$data->date_kr);
						            		return $date->format('d-m-Y');
						            		
						            }
						            ],
						            [   'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 155px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'date_ivv',
						            		'content'=>function($data){
						            		$date = \DateTime::createFromFormat('Y-m-d',$data->date_ivv);
						            		return $date->format('d-m-Y');
						            		
						            }
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'tr_t1',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'tr_t2',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'kr_t1',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'kr_t2',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'ivv',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'ru04_tr',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'ru04_kr',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'ru04_ivv',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'av_tr',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'av_kr',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'av_ivv',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'p_iz',
						            ],
						            [  	'class'=>'yii\grid\DataColumn',
						            		'headerOptions' => ['style'=>'width: 400px; white-space:normal;','class' => 'text-left'],
						            		'attribute'=>'ha_tm',
						            ],
						            						
						        								        		
						           // ['class' => 'yii\grid\ActionColumn'],
						        ],
						    ]);*/ ?>
		</div>
	</div>

	<div class="row">
	    <div class="col-md-3">
    	<?php		echo $this->render('_menu',['model'=>$model]);   	?>
    	</div>
    </div>	
<?php Pjax::end();?>    
</div>

