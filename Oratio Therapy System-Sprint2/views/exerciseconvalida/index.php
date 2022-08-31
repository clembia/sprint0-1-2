<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use amnah\yii2\user\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExerciseconvalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$q = User::findone(['codFisc'=> Yii::$app->user->identity->cfUtAssociato]);

if ($q)
    $t = 'Esercizi da convalidare  dell\'utente: ' . strtoupper($q->cognome . ' ' . $q->nome);
else 
    $t= 'Esercizi da convalidare  dell\'utente: ';

$this->title = $t;
$this->params['breadcrumbs'][] = ['label' => 'Menù Caregiver', 'url' => ['/site/homecaregiver']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi da convalidare', 'url' => ['index']];
$this->params['breadcrumbs'][] = strtoupper($q->cognome . ' ' . $q->nome);
?>
<div class="exercisesvolto-index">

    <h2><?= Html::encode($this->title) ?></h2>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdAssegn',
            //'cfUtente',
            //'idEsercizio',
            [
                'label' => 'Id Esercizio',
                'attribute' => 'idEsercizio',],
            //'dataAss',
            //'dataSvolg',
            //'svolto',
            [
                'label' => 'Risultato esercizio',
                'attribute' => 'PunteggioOtt',
                'filter' => [0 => 'Non corretto', 1 => 'Corretto'],
                'value' => function($model)  {
                    return $model->PunteggioOtt== 0 ? 'Non Corretto' : 'Corretto';
                },
               //'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],
            //'PunteggioOtt',
            //'IndiceGradimento',
            [
                'label' => 'Indice Gradimento',
                'attribute' => 'IndiceGradimento',
                'filter' => ['20' => '20', '40' => '40', '60' => '60', '80' => '80','100' => '100'],
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],
            //'convalida',
            [
                'label' => 'Convalidato',
                'attribute' => 'convalida',
                'filter' => ['0' => 'No', '1' => 'Si'],
                'value' => function($model)  {
                    return $model->convalida== 0 ? 'Non Convalidato' : 'Convalidato';
                },
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],


            [
                'class' => ActionColumn::class,
                'template' => '{view} ',
                'buttons' => [
            
                    'view' => function ($url, $model, $key) {
           
                        return $model->convalida === 1 ?  Html::a('<span class="glyphicon glyphicon-eye-open">Aggiorna</span>', Url::toRoute(['exerciseconvalida/update', 'IdAssegn' => $model->IdAssegn]), [

                            'title' => Yii::t('yii', 'View'), ]) :  Html::a('<span class="glyphicon glyphicon-eye-open">Convalida</span>', Url::toRoute(['exerciseconvalida/create', 'IdAssegn' => $model->IdAssegn]), [

                           'title' => Yii::t('yii', 'View'), ]);
           
                    },



                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdAssegn' => $model->IdAssegn]);
                 }
            ], ],
        ],
    ]); ?>


</div>
