<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Exercisesvolto;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */

$this->title = "Dettaglio esercizio assegnato";
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da assegnare', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View nr. ' . $model->idEsercizio;
\yii\web\YiiAsset::register($this);
?>
<div class="exercisesvolto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
     <?php 
       $c1=Exercisesvolto::find()->where(['cfUtente'=>$model->cfUtente, 'idEsercizio' => $model->idEsercizio, 'svolto'=>1])->count();
      if ($c1==0)
      {
        echo Html::a('Update', ['update', 'IdAssegn' => $model->IdAssegn], ['class' => 'btn btn-primary']); 
        echo Html::a('Delete', ['delete', 'IdAssegn' => $model->IdAssegn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
      }   
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'IdAssegn',
            'cfUtente',
            'idEsercizio',
            'dataAss:date',
           // 'svolto',
           // 'PunteggioOtt',
           // 'IndiceGradimento',
           // 'convalida',
        ],
    ]) ?>

</div>
