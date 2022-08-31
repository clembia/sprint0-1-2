<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Verifica */

$this->title = 'Update Verifica: ' . $model->idTest;
$this->params['breadcrumbs'][] = ['label' => 'Verificas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTest, 'url' => ['view', 'idTest' => $model->idTest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verifica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
