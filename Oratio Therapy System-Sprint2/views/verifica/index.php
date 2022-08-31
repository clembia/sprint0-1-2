<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VerificaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifica pretest Utenti';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['/site/homelogopedista']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifica-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idTest',
            'cognome',
            'nome',
            [
                'attribute' =>'codFisc',
                'label'  => 'Codice Fiscale',
            ],
            'email:email',
            //'risp1',
            //'risp2',
            //'risp3',
            //'risp4',
            //'risp5',
            //'ut1',
            //'ut2',
            //'ut3',
            //'ut4',
            //'ut5',
            'time_begin:datetime',
            'time_end:datetime',
            'nr_corrette',
            [
                'class' => ActionColumn::class,
                'template'=>'{view}{delete}',
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTest' => $model->idTest]);
                 }
                 
            ],
        ],
    ]); ?>


</div>
