<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VerificaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTest') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'codFisc') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'risp1') ?>

    <?php // echo $form->field($model, 'risp2') ?>

    <?php // echo $form->field($model, 'risp3') ?>

    <?php // echo $form->field($model, 'risp4') ?>

    <?php // echo $form->field($model, 'risp5') ?>

    <?php // echo $form->field($model, 'ut1') ?>

    <?php // echo $form->field($model, 'ut2') ?>

    <?php // echo $form->field($model, 'ut3') ?>

    <?php // echo $form->field($model, 'ut4') ?>

    <?php // echo $form->field($model, 'ut5') ?>

    <?php // echo $form->field($model, 'time_begin') ?>

    <?php // echo $form->field($model, 'time_end') ?>

    <?php // echo $form->field($model, 'nr_corrette') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
