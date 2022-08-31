<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExercisesvoltoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercisesvolto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdAssegn') ?>

    <?= $form->field($model, 'cfUtente') ?>

    <?= $form->field($model, 'idEsercizio') ?>

    <?= $form->field($model, 'svolto') ?>

    <?= $form->field($model, 'PunteggioOtt') ?>

    <?php // echo $form->field($model, 'IndiceGradimento') ?>

    <?php // echo $form->field($model, 'convalida') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
