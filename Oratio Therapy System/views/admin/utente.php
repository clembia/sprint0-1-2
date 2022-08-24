<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


$this->title = 'Gestione Utenti';
$this->params['breadcrumbs'][] = $this->title;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\search\UserSearchUtente $searchModel
 * 
 * @var amnah\yii2\user\models\Role $role
 */

$module = $this->context->module;
$user = $module->model("User");
$role = $module->model("Role");

$this->title = Yii::t('user', 'Gestione Utenti');
?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('user', 'Nuovo {modelClass}', [
          'modelClass' => 'Utente',
        ]), ['createuser'], ['class' => 'btn btn-success']) ?>
    </p>
        <?php 
        /** 
        * @var amnah\yii2\user\models\Role $role 
        * @var amnah\yii2\user\models\User $user
        */ ?>
    <?php \yii\widgets\Pjax::begin(); ?>


 


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
         //   [
         //       'attribute' => 'role_id',
         //       'label' => Yii::t('user', 'Role'),
         //       'filter' => $role::dropdown(),
         //       'value' => function($model, $index, $dataColumn) use ($role) {
         //           $roleDropdown = $role::dropdown();
         //           return $roleDropdown[$model->role_id];
         //       },
         //   ],
         'cognome',
            'nome',
            'email:email',  
         [
                'attribute' => 'status',
                'label' => Yii::t('user', 'Status'),
                'filter' => $user::statusDropdown(),
                'value' => function($model, $index, $dataColumn) use ($user) {
                    $statusDropdown = $user::statusDropdown();
                    return $statusDropdown[$model->status];
                },
                
            ],
            

            //'profile.full_name',
            //'profile.timezone',
            //'created_at',
             //'username',
            // 'password',
            // 'auth_key',
            // 'access_token',
            // 'logged_in_ip',
            // 'logged_in_at',
            // 'created_ip',
            // 'updated_at',
            // 'banned_at',
            // 'banned_reason',

           // ['class' => 'yii\grid\ActionColumn', 'template' => '{view} '],
            [
                'class' => yii\grid\ActionColumn::class,
                'template' => '{view}',
                'buttons' => [
            
                    'view' => function ($url, $model, $key) {
           
                        return   Html::a('<span class="glyphicon glyphicon-eye-open">vista</span>', Url::toRoute(['admin/viewutente', 'id' => $model->id]), [

                            'title' => Yii::t('yii', 'view'), ]);
           
                    },



                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], ],



            
        ], 
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>

</div>
