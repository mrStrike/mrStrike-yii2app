<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Добавление ремонта';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Характеристика здания', 'url' => ['j_build', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
	    
?>
<?php $form = ActiveForm::begin([
		//'layout'=>'inline',
		'fieldConfig' => [
				'template' => '<div class="col-md-3">{label}</div><div class="col-md-8">{input}</div>',			
				'labelOptions' => ['class' => 'label-control', 'style'=>'font-weight: normal;'],
				'inputOptions' => ['class' => 'form-control', 'style'=>'font-weight: normal;'],
		],		
]); ?>
<div class="buildings_view">
    <h3><?= Html::encode($model->name) ?></h3>
    <div class="btn-group" role="group">
		<?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', ['j_build', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
		<?= Html::submitButton('<span class="glyphicon glyphicon-floppy-disk"></span>  Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
	<div class="row"><div class="col-md-12"></div></div>    
	<div class="row">
		<div class="col-md-12">
			<table class="table table-condensed" style="margin-top:20px;">
				<tbody>
					<tr>
						<td>
							<h4>Добавление ремонта здания</h3>							
							<table class="table table-striped table-condensed table-hover" style="margin-left:10px;">
								<tr><td><?= $form->field($remont, 'remont_info')->textarea(['rows' => 6])?></td></tr>
								<tr><td><?= $form->field($remont, 'remont_p')->textarea(['rows' => 6])?></td></tr>
							
								<tr><td><?= $form->field($remont, 'date_r')->widget(DatePicker::className(),
										[							
												'value'=>date('Y-m-d'),
												'options'=>['placeholder'=>'Выберите дату'],
												'pluginOptions'=>[
														'format'=>'dd-mm-yyyy',
														'autoclose'=>true,
														'todayHiglight'=>true,
														//'minViewMode' => 2, 
												],
										]
								)?></td></tr>
								<tr><td><?= $form->field($remont, 'fio_curator')->textInput()?></td></tr>																
							</table>												    														
						</td>
					</tr>
					<tr>
						<td>
						    <div class="form-group">
						    </div>
						</td>
					</tr>
				</tbody>
			</table>
					
		</div>
	</div>	
</div>
<?php ActiveForm::end(); ?>