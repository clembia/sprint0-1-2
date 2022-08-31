<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Verifica */

$this->title = "Vista dettaglio Pretest";
$this->params['breadcrumbs'][] = ['label' => 'Pretest utenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="verifica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Delete', ['delete', 'idTest' => $model->idTest], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sei sicuro di voler cancellare il pretest dell\'utente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idTest',
            'cognome',
            'nome',
            [  'attribute' => 'codFisc',
            'label' => 'Codice Fiscale'],
           // 'codFisc:ntext',
            'email:email',
            //'risp1',
            //'risp2',
            //'risp3',
           // 'risp4',
           // 'risp5',
            //'ut1',
            [  'attribute' => 'ut1',
                'label' => 'Risposta Utente /Esatta Test 1',
                'value' => strtoupper($model->ut1 . '/' . $model->risp1),       
            ],
            [  'attribute' => 'ut2',
               'label' => 'Risposta Utente /Esatta Test 2',
               'value' => strtoupper($model->ut2 . '/' . $model->risp2),    
            ],
            [  'attribute' => 'ut3',
            'label' =>  'Risposta Utente /Esatta Test 3',
            'value' => strtoupper($model->ut3 . '/' . $model->risp3),       
            ],
            [  'attribute' => 'ut4',
            'label' =>  'Risposta Utente /Esatta Test 4',
            'value' => strtoupper($model->ut4 . '/' . $model->risp4),       
             ],
             [  'attribute' => 'ut5',
             'label' =>  'Risposta Utente /Esatta Test 5',
             'value' => strtoupper($model->ut5 . '/' . $model->risp5),       
             ],
           // 'ut2',
            //'ut3',
            //'ut4',
            //'ut5',
            'time_begin',
            'time_end',
            'nr_corrette',
        ],
    ]) ?>

</div>
