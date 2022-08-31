<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = "Dettaglio esercizio convalidato";
$this->params['breadcrumbs'][] = ['label' => 'Menù Caregiver', 'url' => ['/site/homecaregiver']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da convalidare', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View nr. ' . $model->idEsercizio;
\yii\web\YiiAsset::register($this);
?>
<div class="exercisesvolto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdAssegn' => $model->IdAssegn], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'IdAssegn',
            'cfUtente',
            'idEsercizio',
            //'dataAss',
            'svolto',
            'PunteggioOtt',
            'IndiceGradimento',
            'convalida',
        ],
    ]) ?>

</div>