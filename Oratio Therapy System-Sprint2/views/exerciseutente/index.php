<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use amnah\yii2\user\models\User;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExercisesvoltoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$logcf = User::findone(['codFisc' =>Yii::$app->user->identity->codFisc ])->cfLogAssociato; 
$logo =  User::findone(['codFisc' =>$logcf ]); 
$this->title = 'Esercizi assegnati dal logopedista: ' . strtoupper($logo->cognome . ' ' . $logo->nome);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="exercisesvolto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--
    <p>
        <? //echo Html::a('Esegui Esercizi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
     
            //'IdAssegn',
            //'cfUtente',
           // 'idEsercizio',

                    [
                        'attribute' => 'dataAss',
                        'format' => ['date', 'php:d/m/Y'],
                        'value' =>'dataAss',
                        'filter' => DatePicker::widget([
                            'type' => DatePicker::TYPE_INPUT,
                            'attribute' => 'dataAss',
                            'model' => $searchModel,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy/mm/dd'
                           ], 
                        ]),
                        ],


            [
                'attribute' => 'dataSvolg',
                'format' => ['date', 'php:d/m/Y'],
                'value' =>'dataSvolg',
                'filter' => DatePicker::widget([
                    'type' => DatePicker::TYPE_INPUT,
                    'attribute' => 'dataSvolg',
                    'model' => $searchModel,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy/mm/dd'
                   ], 
                ]),

                
            ],
            [
                'label' => 'Esercizio Svolto',
                'attribute' => 'svolto',
                'filter' => ['0' => 'Non Completati', '1' => 'Completati'],
                'value' => function($model)  {
                    return $model->svolto== 0 ? 'Non Completato' : 'Completato';
                },
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],


            // 'svolto',
            [
                'label' => 'Risp. Corretta',
                'attribute' => 'PunteggioOtt',
                'filter' => ['0' => 'Sbagliata', '1' => 'Esatta'],
                'value' => function($model)  {
                    return $model->PunteggioOtt== 0 ? 'Sbagliata' : 'Esatta';
                },
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],
            //'PunteggioOtt',
            //'IndiceGradimento',
            [

                'label' => 'Convalida Caregiver',
                'attribute' => 'convalida',
                'filter' => ['0' => 'Non Convalidata', '1' => 'Convalidata'],
                'value' => function($model)  {
                    return $model->convalida== 0 ? 'Non Convalidata' : 'Convalidata';
                },
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]

            ],
            [
                'label' => 'Indice Gradimento',
                'attribute' => 'IndiceGradimento',
                'filter' => ['20' => '20', '40' => '40', '60' => '60', '80' => '80','100' => '100'],
                'filterInputOptions' => ['class' => 'form-control', 'id' => null]
            ],
           // 'convalida',
            [
                'class' => ActionColumn::class,
                'template' => '{view} ',
                'buttons' => [
            
                    'view' => function ($url, $model, $key) {
           
                         return $model->svolto === 1 ? '' : Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['exerciseutente/view', 'IdAssegn' => $model->IdAssegn]), [

                           'title' => Yii::t('yii', 'View'), ]);
           
                    },



                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdAssegn' => $model->IdAssegn]);
                 }
            ],


     ]]] ); ?>


</div>
