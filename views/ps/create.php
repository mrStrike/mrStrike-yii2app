<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ps */

$this->title = 'Создать новую подстанцию';
$this->params['breadcrumbs'][] = ['label' => 'Подстанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
