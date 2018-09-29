<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
$action = Yii::$app->controller->action->id;
$lgi="list-group-item list-group-item-action";
$st='style="height: 30px; padding: 5px 15px;"';
$stl='height: 30px; padding: 5px 15px;';
?>
<!-- <h4><u>Разделы паспорта</u></h4>  -->
<h3></h3>
<div class="list-group" style="font-size:12px;">
	<?= Html::a('Технические данные и характеристики', 
			['view', 'id' => $model->id], ['class' => $lgi.($action=='view'?' active':''),'style'=>$stl]) ?>		
	<?= Html::a('Характеристика здания', 
			['j_build', 'id' => $model->id], ['class' => $lgi.($action=='j_build'?' active':''),'style'=>$stl]) ?>			
	<?= Html::a('Экран ТП', 
			['j_tp', 'id' => $model->id], ['class' => $lgi.($action=='j_tp'?' active':''),'style'=>$stl]) ?>		
	<?= Html::a('Однолинейная расчетная схема', 
			['j_shem', 'id' => $model->id], ['class' => $lgi.($action=='j_shem'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Характеристика РУ-ВН', 
			['j_hruvn', 'id' => $model->id], ['class' => $lgi.($action=='j_hruvn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Испытания РУ-ВН', 
			['j_iruvn', 'id' => $model->id], ['class' => $lgi.($action=='j_iruvn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Текущий ремонт РУ-ВН', 
			['j_truvn', 'id' => $model->id], ['class' => $lgi.($action=='j_truvn'?' active':''),'style'=>$stl]) ?>		
	<?= Html::a('Капитальный ремонт РУ-ВН', 
			['j_kruvn', 'id' => $model->id], ['class' => $lgi.($action=='j_kruvn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Характеристика РУ-НН', 
			['j_hrunn', 'id' => $model->id], ['class' => $lgi.($action=='j_hrunn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Испытания РУ-НН', 
			['j_irunn', 'id' => $model->id], ['class' => $lgi.($action=='j_irunn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Текущий ремонт РУ-НН', 
			['j_trunn', 'id' => $model->id], ['class' => $lgi.($action=='j_trunn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Капитальный ремонт РУ-НН', 
			['j_krunn', 'id' => $model->id], ['class' => $lgi.($action=='j_krunn'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Релейная защита, уставки ТП', 
			['j_rza', 'id' => $model->id], ['class' => $lgi.($action=='j_rza'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Ремонт и проверка защиты автоматов', 
			['j_rem', 'id' => $model->id], ['class' => $lgi.($action=='j_rem'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Сопротивление изоляции освещения', 
			['j_sizp', 'id' => $model->id], ['class' => $lgi.($action=='j_sizp'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Журнал изменений', 
			['j_change', 'id' => $model->id], ['class' => $lgi.($action=='j_change'?' active':''),'style'=>$stl]) ?>	
	<?= Html::a('Проверке ведения паспорта', 
			['j_check', 'id' => $model->id], ['class' => $lgi.($action=='j_check'?' active':''),'style'=>$stl]) ?>	
</div>
<?php

?>