<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = 'Aggiornamento Exercizio assegnato';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da assegnare', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update nr. ' .  $model->idEsercizio;
?>
<div class="exercisesvolto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'g' => $g,
        'h' => $h,
    ]) ?>

</div>
