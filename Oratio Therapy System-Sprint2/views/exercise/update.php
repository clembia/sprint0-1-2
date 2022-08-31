<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercise */

$this->title = 'Aggiornamento Esercizio: coppie minime';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update nr. ' . $model->idEsercizio;
?>
<div class="exercise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list' => $list,
    ]) ?>

</div>
