<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = ['label'=>'Пользователи','url'=>['/account/accounts']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
<?php
$form = ActiveForm::begin([
	'id'=>'account-new',
	'options'=>['class'=>'form-horizontal col-lg-11'],
	'fieldConfig' => [
				'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
				'labelOptions' => ['class' => 'col-lg-4 control-label'],
	],
]);
?>


<?=$form->field($model,'login',['inputOptions'=>['autocomplete'=>'off']])->label('Пользователь') ?>
<?=$form->field($model,'password')->passwordInput()->label('Пароль')?>
<?=$form->field($model,'fam')->label('Фамилия')?>
<?=$form->field($model,'im')->label('Имя')?>
<?=$form->field($model,'ot')->label('Отчество')?>


<div class="form-group">
	<div class="col-lg-offset-4 col-lg-11">
	<?=Html::submitButton('Сохранить',['class'=>'btn btn-primary'])?>
	<?=Html::a('Отмена',Url::to(['account/accounts']),['class'=>'btn btn-default'])?>	
	</div>
</div>

<?php
ActiveForm::end();
?>
</div>