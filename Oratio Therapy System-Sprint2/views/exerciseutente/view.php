<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = 'Completa il seguente esercizio';
$this->params['breadcrumbs'][] = ['label' => 'Exercisesvoltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdAssegn, 'url' => ['view', 'IdAssegn' => $model->IdAssegn]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="exercisesvolto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
     //   'g' => $g,
     //   'h' => $h,
    ]) ?>

</div>
