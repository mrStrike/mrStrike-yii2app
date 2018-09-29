<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Технические данные';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-view">

    <h3><?= Html::encode($model->name) ?></h3>
    <div class="btn-group" role="group">
		<?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Назад', Url::to(['ps/index']), ['class' => 'btn btn-success']) ?>    
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Удалить подстанцию', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить подстанцию?',
                'method' => 'post',
            ],
        ]) ?>       
    </div>
<div class="row">
    <div class="col-md-3">
    	<?php
    	echo $this->render('_menu',['model'=>$model]);
    	?>
    </div>

	<div class="col-md-9">
		<div class="row"><div class="col-md-7"><h4>Технические данные и характеристики</h4></div></div>	
    <?= DetailView::widget([
        'model' => $model,
    	'template' => '<tr><th style="width:230px; max-width:230px;">{label}</th><td>{value}</td></tr>',
     	'options' => [
     				'class' => 'table table-striped table-bordered table-condensed table-hover'
     		],
        'attributes' => [
           // 'id',
        	'inn',
        	'name',
            'year_build',
            'year_expl',
            'section_count',
            'trans_count',
            'pris_count',

            'pos_build',
            'build_org',
            'project_org',

            'power_point',
            'dop_data:ntext',
        ],
    ]) ?>
    </div>
</div>

</div>
