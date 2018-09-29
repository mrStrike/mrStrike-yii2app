<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Характеристика зданий';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
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
							<h4>Характеристики здания</h3>							
							<table class="table table-striped table-condensed table-hover" style="margin-left:10px;">
								<tr><td><?= $form->field($buildings, 'name')->textInput()?></td></tr>
								<tr><td><?= $form->field($buildings, 'fundament')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'stena')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'perekritie')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'krovli')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'dor_iron')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'dor_tree')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'build_h')->textInput() ?></td></tr>
								<tr><td><?= $form->field($buildings, 'other')->textarea(['rows' => 6])?></td></tr>								
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