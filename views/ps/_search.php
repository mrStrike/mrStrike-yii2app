<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'year_build') ?>

    <?= $form->field($model, 'year_expl') ?>

    <?= $form->field($model, 'section_count') ?>

    <?= $form->field($model, 'trans_count') ?>

    <?php // echo $form->field($model, 'pris_count') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'pos_build') ?>

    <?php // echo $form->field($model, 'build_org') ?>

    <?php // echo $form->field($model, 'project_org') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'power_point') ?>

    <?php // echo $form->field($model, 'dop_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
