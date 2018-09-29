<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\base\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-form">

    <?php $form = ActiveForm::begin([
    		'layout'=>'horizontal',
    ]); ?>

    <div class="form-group">
		<?php
			if(Yii::$app->controller->action->id!="create"){
				echo Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', ['view', 'id' => $model->id], ['class' => 'btn btn-success']);
			}
			else{
				echo Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', ['index'], ['class' => 'btn btn-success']);
			}
				
		?>    
        <?= Html::submitButton('<span class="glyphicon glyphicon-floppy-disk"></span>  Сохранить', ['class' => 'btn btn-primary']) ?>		
    </div>
    
        
    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>    
    
    <?php
    //TODO: тут я использую виджет в качестве поля ввода даты
    ?>
	<?= $form->field($model, 'year_build')->widget(DatePicker::className(),
			[
					//'name'=>'dtPicker',
					'value'=>date('Y'),
					'options'=>['placeholder'=>'Выберите дату'],
					'pluginOptions'=>[
							'format'=>'yyyy',
							'autoclose'=>true,
							'todayHiglight'=>true,
							'minViewMode' => 2,
					],
			]
	)?>    
	<?=$form->field($model,'year_expl')->widget(DatePicker::className(),
			[
					//'name'=>'dtPicker',
					'value'=>date('Y'),
					'options'=>['placeholder'=>'Выберите дату'],
					'pluginOptions'=>[
							'format'=>'yyyy',
							'autoclose'=>true,
							'todayHiglight'=>true,
							'minViewMode' => 2,
					],
			]
	) ?>
	
    <?= $form->field($model, 'section_count')->textInput() ?>

    <?= $form->field($model, 'trans_count')->textInput() ?>

    <?= $form->field($model, 'pris_count')->textInput() ?>



    <?= $form->field($model, 'pos_build')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'build_org')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_org')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'power_point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dop_data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
