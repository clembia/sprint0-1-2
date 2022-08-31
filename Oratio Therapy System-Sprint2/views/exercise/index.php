<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Parole;
use app\models\Exercisesvolto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExerciseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Gestione esercizi';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = 'Esercizi';



?>
<div class="exercise-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuovo Esercizio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' =>"id Esercizio",
                'attribute' => 'idEsercizio',
                'headerOptions' => ['width' => '180px'],
            ],
            //'idEsercizio',
            //'cflog',
            [
                //'attribute' => 'idParola1',
                'label' => 'Parola nr.1',
                'value' => function ($model){  
                    $data =  (Parole::findOne($model->idParola1))->parola;
                    return  $data;}, 
               ],
              // 'idParola1',
              [
                //'attribute' => 'idParola2',
                'label' => 'Parola nr.2',
                'value' => function ($model){  
                    $data =  (Parole::findOne($model->idParola2))->parola;
                    return  $data;}, 
                //filter' => Exercise::get_risp2()

               ],
            //'rispCorretta',
            [
                'attribute' => 'rispCorretta',
                'filter'=>array("1"=>"Parola1","2"=>"Parola2"),
                //'filter' => Exercise::get_risp(),
                
            ],

            [
                'class' => ActionColumn::class,
                'headerOptions' => ['width' => '100px'],
                'template' => '{view} {update} {delete} ',
                'buttons' => [
            
                    'view' => function ($url, $model, $key) {
           
                        return  Html::a('&#128065', Url::toRoute(['exercise/view', 'idEsercizio' => $model->idEsercizio]), [

                            'title' => Yii::t('yii', 'View'), ]);
           
                    },
                   
                    'update' => function ($url, $model, $key) {
                        $c1=Exercisesvolto::find()->where(['idEsercizio' => $model->idEsercizio, 'svolto'=>1])->count();
                        return  ($c1==0) ? Html::a('&#128393', Url::toRoute(['exercise/update', 'idEsercizio' => $model->idEsercizio]), [

                            'title' => Yii::t('yii', 'Update'), ]) : "";
           
                    },
                    'delete' => function ($url, $model, $key) {
                        $c1=Exercisesvolto::find()->where(['idEsercizio' => $model->idEsercizio,'svolto'=>1])->count();
                        return  ($c1==0)  ? Html::a('&#128465', ['delete', 'idEsercizio' => $model->idEsercizio], [
                           // 'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) : "";
           
                    },


                    'urlCreator' => function ($action,  $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idEsercizio' => $model->idEsercizio]);
                }
            ], 

            ],
        ],
    ]); ?>


</div>
