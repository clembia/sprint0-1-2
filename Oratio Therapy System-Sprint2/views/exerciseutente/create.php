<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = 'Assegnare esercizio ad utente';
$this->params['breadcrumbs'][] = ['label' => 'Exercisesvoltos', 'url' => ['index']];
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
