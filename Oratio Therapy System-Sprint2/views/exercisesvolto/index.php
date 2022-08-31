<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\date\DatePicker;
use app\models\Exercisesvolto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExercisesvoltoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esercizi da assegnare';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercisesvolto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Assegnare Esercizio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdAssegn',
            'cfUtente',
            'idEsercizio',
            //'dataAss:date',
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

            //'dataSvolg',
            //'svolto',
            //'PunteggioOtt',
            //'IndiceGradimento',
            //'convalida',
            [
                'class' => ActionColumn::class,
                'headerOptions' => ['width' => '100px'],
                'template' => '{view} {update} {delete} ',
                'buttons' => [
            
                    'view' => function ($url, $model, $key) {
           
                        return  Html::a('&#128065', Url::toRoute(['exercisesvolto/view', 'IdAssegn' => $model->IdAssegn]), [

                            'title' => Yii::t('yii', 'View'), ]);
           
                    },
                   
                    'update' => function ($url, $model, $key) {
                        $c1=Exercisesvolto::find()->where(['cfUtente'=>$model->cfUtente, 'idEsercizio' => $model->idEsercizio, 'svolto'=>1])->count();
                        return  ($c1==0) ? Html::a('&#128393', Url::toRoute(['exercisesvolto/update', 'IdAssegn' => $model->IdAssegn]), [

                            'title' => Yii::t('yii', 'Update'), ]) : "";
           
                    },
                    'delete' => function ($url, $model, $key) {
                        $c1=Exercisesvolto::find()->where(['cfUtente'=>$model->cfUtente, 'idEsercizio' => $model->idEsercizio, 'svolto'=>1])->count();
                        return  ($c1==0)  ? Html::a('&#128465', ['delete', 'IdAssegn' => $model->IdAssegn], [
                           // 'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) : "";
           
                    },


                    'urlCreator' => function ($action,  $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'IdAssegn' => $model->IdAssegn]);
                }
            ], 

            ],
        
        ],
    ]); ?>


</div>
