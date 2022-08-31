<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UtentiSearch1*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recapiti telefonici Logopedisti';
?>
<div class="utenti-index">
<br>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'role_id',
            //'status',
            'cognome',
            'nome',
            //'dataNascita',
            //
            'email:email',
            //'logged_in_at',
            //'password',
            //'codFisc',
            ['attribute' =>'cell',
            'label'=>'Cellulare'],
            //'cell',
            //'codLicenza',
            //'cfUtAssociato',
            //'cfLogAssociato',
            //'auth_key',
            //'access_token',
            //'logged_in_ip',
            //'created_ip',
            //'created_at',
            //'updated_at',
            //'banned_at',
            //'banned_reason',
        ],
    ]); ?>

</div>
