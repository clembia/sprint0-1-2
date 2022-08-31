<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExerciseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'idEsercizio') ?>

    <?php //echo $form->field($model, 'cflog') ?>

    <?= $form->field($model, 'idParola1') ?>

    <?= $form->field($model, 'idParola2') ?>

    <?= $form->field($model, 'rispCorretta') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
