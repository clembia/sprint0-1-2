<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = 'Aggiornamento Convalida esercizio ';
$this->params['breadcrumbs'][] = ['label' => 'Menù Caregiver', 'url' => ['/site/homecaregiver']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da convalidare', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update esercizio nr. ' . $model->idEsercizio; 
?>
<div class="exercisesvolto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
