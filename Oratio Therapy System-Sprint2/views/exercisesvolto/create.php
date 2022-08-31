<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = 'Assegnare nuovo esercizio ad utente';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da assegnare', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercisesvolto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'g' => $g,
        'h' => $h,
       
    ]) ?>

</div>
