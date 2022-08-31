<?php
/* @var $this yii\web\View */

use yii\grid\GridView;


$this->title = 'Gradimento Utenti';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Statistiche gradimento utenti</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' =>"Id Esercizio",
            'value'=>function($data){
                return $data["idEsercizio"];
            }
        ],
        [
            'label' =>"Gradimento medio",
            'value'=>function($data){
                return $data["media"];
            }
        ],
        [
            'label' =>"Efficacia",
            'attribute' => 'efficacia',
        ],
    ],
]); ?>
